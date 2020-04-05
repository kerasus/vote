@extends('layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="row">
                    <div class="col-md-6 alert alert-info" role="alert">
                        <h4 class="alert-heading">پویش کتاب خوب من!</h4>
                        <p>براي كتاب هاي برتر در نظرسنجی کتاب من در سایت <a href="https://www.chibekhoonam.net/product-tag/%D9%BE%D9%88%DB%8C%D8%B4-%DA%A9%D8%AA%D8%A7%D8%A8-%D9%85%D9%86/">چی بخونم</a>، تخفيف ٢٥٪؜  اعمال شد. این پویش تا 20 مهر ادامه دارد و ممکن است رتبه بندی کتاب ها تغییر کند.</p>
                        <p> در صورتی که کتابی به 3 کتاب برتر درس خود بپیوندد، تخفیف 25% برای آن کتاب هم درنظر گرفته خواهد شد.</p>
                        <p>البته این کار یک ویژگی مهم دیگه هم داره. اونم اینه که میتونیم بفهمیم تو هر درس کدوم کتابا بیشتر طرفدار داره و کاربردی تره!</p>
                        <hr>
                        <p class="mb-0">رای بدید و کتاب های منتخب رو با بیشترین تخفیف ببرید</p>
                        <p class="mb-0">رای به ضروری ترین کتـــاب ها با بیشترین صرفه اقتصادی</p>
                    </div>
                    <div class="col-md-6  alert alert-warning" role="alert">
                        <h4 class="alert-heading">جوایز </h4>
                        <p>جوایزی که سایت <a href="https://www.chibekhoonam.net/product-tag/%D9%BE%D9%88%DB%8C%D8%B4-%DA%A9%D8%AA%D8%A7%D8%A8-%D9%85%D9%86/">چی بخونم</a> ویژه کسانی که در نظرسنجی شرکت می کنند و از سایتشون خرید می کنند، در نظر گرفته:</p>
                        <p>
                            <strong>
                                1-
                                آخر نظرسنجی (ویژه کسانی که رای می دهند)
                            </strong>
                            3 تا بن 100 هزارتومانی خرید کتاب
                        </p>
                        <p>
                            <strong>
                                2-
                                پایان پویش کتاب من (ویژه کسانی که از چی بخونم کتاب تهیه می کنند)</strong>
                            7 تا بن 100 هزارتومانی خرید کتاب
                        </p>
                        <p>
                            <strong>
                                3-
                                آخر نظرسنجی (ویژه کسانی که رای می دهند)</strong>
                            کد تخفیف 5% همایش های <a href="https://alaatv.com/shop">آلاء</a>
                        </p>
                        <p>
                            <strong>
                                4-
                                پایان پویش کتاب من (ویژه کسانی که از چی بخونم کتاب تهیه می کنند)</strong>
                            کد تخفیف 25% همایش های <a href="https://alaatv.com/shop">آلاء</a>
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                
                <collapse-group>
                    <div class="text-center">
                        <i class="fa fa-spinner fa-pulse fa-5x fa-fw margin-bottom"></i>
                        <br>
                        در حال دریافت اطلاعات . . . .
                    </div>
                </collapse-group>
            
            </div>
        </div>
    </div>
@endsection



@section('page-js')

@endsection
