<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BienLaiHocPhi;
use App\Models\ChiTietLopHoc;
use App\Models\HocSinh;
use App\Models\LopNangKhieu;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TutionController extends Controller
{
    public function show()
    {
        // $this->AuthLogin();
        $lcs = BienLaiHocPhi::all();
        return view('admin.tution.list', [
            'title' => 'Danh Sách Biên Lai Học Phí'
        ])->with('data', $lcs);
    }
    public function show2()
    {
        $lh = LopNangKhieu::all();
        return view('admin.tution.add', [
            'title' => 'Thêm Biên Lai Học Phí'
        ])->with('lh', $lh);
    }
    public function index()
    {
        return view('admin.customer.add', [
            'title' => 'Thêm Nhân Viên'
        ]);
    }
    public function add(Request $request)
    {
        $this->validate($request, [
            'ma' => 'required',
            'ngay' => 'required',
            'tien' => 'required|numeric',
            // 'ghichu' => 'required',
            'malop' => 'required',
            'mahs' => 'required'
        ], [
            'ma.required' => 'Chưa nhập mã',
            'ngay.required' => 'Chưa nhập ngày đóng',
            'tien.required' => 'Chưa nhập số tiền',
            'tien.numeric' => 'Số tiền bữa ăn phải là số',
            'malop.required' => 'Chưa chọn lớp',
            'mahs.required' => 'Chưa chọn học sinh'
        ]);
        $nv = new BienLaiHocPhi();
        $nv->MaBL = $request->ma;
        $nv->NgayDong = $request->ngay;
        $nv->SoTien = $request->tien;
        $nv->GhiChu = $request->ghichu;
        $nv->MaLop = $request->malop;
        $nv->MaHS = $request->mahs;
        $nv->MaNV = Session::get('loginId');
        $nv->save();
        return Redirect('/admin/tution/list')->with('success', 'Thêm thành công');
    }
    public function add2(Request $request)
    {
        $data = $request->all();
        $output = [];
        if ($data['action'] == 'lop') {

            $ct = ChiTietLopHoc::where('MaLop', $data['malop'])->get();

            foreach ($ct as $k => $v) {
                $hs = HocSinh::where('MaHS', $v->MaHS)->first();
                $output[] .= '<option value="' . $v->MaHS . '">' . $hs->TenHS . '</option>';
            }
            $lh = LopNangKhieu::where('Malop', $data['malop'])->first();
            $output[] .= $lh->HocPhi;
        }
        return $output;
    }
    public function edit($id)
    {
        $nv = BienLaiHocPhi::where('MaBL', $id)->first();
        return view('admin.tution.edit', [
            'title' => 'Sửa Biên Lai Học Phí'
        ])->with('data', $nv);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ngay' => 'required',
            'tien' => 'required|numeric',
            'ghichu' => 'required',
        ], [
            'ngay.required' => 'Chưa nhập ngày',
            'tien.required' => 'Chưa nhập số tiền',
            'tien.numeric' => 'Số tiền đóng phải là số',
            'ghichu.required' => 'Chưa nhập ghi chú'
        ]);
        $data = array();
        $data['NgayDong'] = $request->ngay;
        $data['SoTien'] = $request->tien;
        $data['GhiChu'] = $request->ghichu;
        DB::table('bienlaihocphi')->where('MaBL', $id)->update($data);
        return Redirect('/admin/tution/list')->with('success', 'Sửa thành công');
    }
    public function delete($id)
    {
        BienLaiHocPhi::where('MaBL', $id)->delete();
        return Redirect('/admin/tution/list')->with('success', 'Xóa thành công');
    }

    public function send_mail($id)
    {
        $bl = BienLaiHocPhi::where('MaBL', $id)->first();
        $hs = HocSinh::where('MaHS', $bl->MaHS)->first();
        $lh = LopNangKhieu::where('MaLop', $bl->MaLop)->get();
        $nv = NhanVien::where('MaNV', $bl->MaNV)->first();
        Mail::send('admin.mail.view', compact('bl', 'hs', 'lh', 'nv'), function ($email) {
            $email->subject('Biên Lai Học Phí');
            $email->to('ntpbot2@gmail.com');
        });
        return Redirect('/admin/tution/list')->with('success', 'Gửi thành công');
        // return view('admin.mail.view')->with('bl', $bl)->with('hs', $hs)->with('lh', $lh)->with('nv', $nv);
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function payments()
    {
        return view('page.payments.list');
    }
    public function momo_payments(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";



        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        // dd($data);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        return redirect()->to($jsonResult['payUrl']);
        // header('Location: ' . $jsonResult['payUrl']);
    }
}
