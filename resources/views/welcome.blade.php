@extends('layouts.app')

@section('content')

{{--    <i class="fa fa-circle-o" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-check" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-minus" aria-hidden="true"></i>--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <collapse-group v-bind:collapse-data="[]"></collapse-group>

                <hr>

                <div class="v--collapse-group">
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            1 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            2 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            3 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            4 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse show">
                        <div class="v--collapse-head">
                            5 نظرسنجی تجربی دهم
                            <span class="v--collapse-head-count">3800 رای</span>
                        </div>
                        <div class="v--collapse-body">
                            <div class="v--vote-group-wrapper">
                                <div class="v--vote-group">
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v--vote-item">
                                        <div class="v--vote-item-title">
                                            ریاضی
                                        </div>
                                        <div class="v--vote-item-countOfTotalVote">
                                            500 رای
                                        </div>
                                        <div class="v--vote-item-choices">
                                            <div class="v--vote-item-choice">
                                                ریاضی خیلی سبز
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کامل قلمچی
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی 2 مبتکران
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی مهر و ماه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice selected">
                                                ریاضی تخته سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی تکمیلی فاکو
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                            <div class="v--vote-item-choice">
                                                ریاضی کلاغ سیاه
                                                <div class="v--vote-item-choice-count"><span>120</span><br>رای</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            6 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body">
                            <div class="v--vote-group">
                                <div class="v--vote-item">
                                    <div class="v--vote-item-title">
                                        ریاضی
                                    </div>
                                    <div class="v--vote-item-choices">
                                        <div class="v--vote-item-choice">
                                            ریاضی خیلی سبز
                                        </div>
                                        <div class="v--vote-item-choice">
                                            ریاضی کامل قلمچی
                                        </div>
                                        <div class="v--vote-item-choice">
                                            ریاضی 2 مبتکران
                                        </div>
                                        <div class="v--vote-item-choice">
                                            ریاضی مهر و ماه
                                        </div>
                                        <div class="v--vote-item-choice">
                                            ریاضی تخته سیاه
                                        </div>
                                        <div class="v--vote-item-choice">
                                            ریاضی تکمیلی فاکو
                                        </div>
                                        <div class="v--vote-item-choice">
                                            ریاضی کلاغ سیاه
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            7 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            8 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            9 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            1 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            1 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                    <div class="v--collapse">
                        <div class="v--collapse-head">
                            1 نظرسنجی تجربی دهم
                        </div>
                        <div class="v--collapse-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('page-js')

@endsection
