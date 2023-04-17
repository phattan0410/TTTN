@extends('page.main')
@section('content')
<div class="row isotope-grid">
    @if(isset($sp))
    @foreach($sp as $k => $v)
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->

        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="/uploads/product/EL.jpg" alt="IMG-PRODUCT">

                <a href="/course/detail/{{$v->MaLop}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                    Quick View
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <!-- <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 js-show-modal1"> -->
                    {{$v->TenLop}}
                    <!-- </a> -->

                    <span class="stext-105 cl3">
                        {{number_format($v->HocPhi,$decimals=0,$dec_point=',',$thousand_sep='.').'đ'}}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>

@endsection