@extends('layouts.app')

@section('content')

{{--    <i class="fa fa-circle-o" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-check" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--    <i class="fa fa-minus" aria-hidden="true"></i>--}}

{{--    <example-component></example-component>--}}
    
{{--    <collapse-item v-bind:collapse-item-data="{title:'salam',body:'matne payam'}"></collapse-item>--}}

    


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <collapse-group
                        v-bind:collapse-data="[
                            {id: 1, title:'title1', body:'body1', headCount:'3800 رای', voteData: [{id: 01, name:'name of choice', count:12, choices:[{id: 111, name:'name1', count:5}, {id: 221, name:'name1', count:5}, {id: 331, name:'name1', count:5}, {id: 441, name:'name1', count:5}]}, {id: 11, name:'name of choice', count:12, choices:[{id: 551, name:'name1', count:5}, {id: 661, name:'name1', count:5}, {id: 771, name:'name1', count:5}, {id: 881, name:'name1', count:5}]}, {id: 21, name:'name of choice', count:12, choices:[{id: 991, name:'name1', count:5}, {id: 101, name:'name1', count:5}, {id: 121, name:'name1', count:5}, {id: 131, name:'name1', count:5}]}, {id: 31, name:'name of choice', count:12, choices:[{id: 141, name:'name1', count:5}, {id: 151, name:'name1', count:5}, {id: 161, name:'name1', count:5}, {id: 171, name:'name1', count:5}]}], show: false},
                            {id: 2, title:'title2', body:'body2', headCount:'3800 رای', voteData: [{id: 02, name:'name of choice', count:12, choices:[{id: 112, name:'name1', count:5}, {id: 222, name:'name1', count:5}, {id: 332, name:'name1', count:5}, {id: 442, name:'name1', count:5}]}, {id: 12, name:'name of choice', count:12, choices:[{id: 552, name:'name1', count:5}, {id: 662, name:'name1', count:5}, {id: 772, name:'name1', count:5}, {id: 882, name:'name1', count:5}]}, {id: 22, name:'name of choice', count:12, choices:[{id: 992, name:'name1', count:5}, {id: 102, name:'name1', count:5}, {id: 122, name:'name1', count:5}, {id: 132, name:'name1', count:5}]}, {id: 32, name:'name of choice', count:12, choices:[{id: 142, name:'name1', count:5}, {id: 152, name:'name1', count:5}, {id: 162, name:'name1', count:5}, {id: 172, name:'name1', count:5}]}], show: false},
                            {id: 3, title:'title3', body:'body3', headCount:'3800 رای', voteData: [{id: 03, name:'name of choice', count:12, choices:[{id: 113, name:'name1', count:5}, {id: 223, name:'name1', count:5}, {id: 333, name:'name1', count:5}, {id: 443, name:'name1', count:5}]}, {id: 13, name:'name of choice', count:12, choices:[{id: 553, name:'name1', count:5}, {id: 663, name:'name1', count:5}, {id: 773, name:'name1', count:5}, {id: 883, name:'name1', count:5}]}, {id: 23, name:'name of choice', count:12, choices:[{id: 993, name:'name1', count:5}, {id: 103, name:'name1', count:5}, {id: 123, name:'name1', count:5}, {id: 133, name:'name1', count:5}]}, {id: 33, name:'name of choice', count:12, choices:[{id: 143, name:'name1', count:5}, {id: 153, name:'name1', count:5}, {id: 163, name:'name1', count:5}, {id: 173, name:'name1', count:5}]}], show: false},
                            {id: 4, title:'title4', body:'body4', headCount:'3800 رای', voteData: [{id: 04, name:'name of choice', count:12, choices:[{id: 114, name:'name1', count:5}, {id: 224, name:'name1', count:5}, {id: 334, name:'name1', count:5}, {id: 444, name:'name1', count:5}]}, {id: 14, name:'name of choice', count:12, choices:[{id: 554, name:'name1', count:5}, {id: 664, name:'name1', count:5}, {id: 774, name:'name1', count:5}, {id: 884, name:'name1', count:5}]}, {id: 24, name:'name of choice', count:12, choices:[{id: 994, name:'name1', count:5}, {id: 104, name:'name1', count:5}, {id: 124, name:'name1', count:5}, {id: 134, name:'name1', count:5}]}, {id: 34, name:'name of choice', count:12, choices:[{id: 144, name:'name1', count:5}, {id: 154, name:'name1', count:5}, {id: 164, name:'name1', count:5}, {id: 174, name:'name1', count:5}]}], show: true },
                            {id: 5, title:'title5', body:'body5', headCount:'3800 رای', voteData: [{id: 05, name:'name of choice', count:12, choices:[{id: 115, name:'name1', count:5}, {id: 225, name:'name1', count:5}, {id: 335, name:'name1', count:5}, {id: 445, name:'name1', count:5}]}, {id: 15, name:'name of choice', count:12, choices:[{id: 555, name:'name1', count:5}, {id: 665, name:'name1', count:5}, {id: 775, name:'name1', count:5}, {id: 885, name:'name1', count:5}]}, {id: 25, name:'name of choice', count:12, choices:[{id: 995, name:'name1', count:5}, {id: 105, name:'name1', count:5}, {id: 125, name:'name1', count:5}, {id: 135, name:'name1', count:5}]}, {id: 35, name:'name of choice', count:12, choices:[{id: 145, name:'name1', count:5}, {id: 155, name:'name1', count:5}, {id: 165, name:'name1', count:5}, {id: 175, name:'name1', count:5}]}], show: false},
                            {id: 6, title:'title6', body:'body6', headCount:'3800 رای', voteData: [{id: 06, name:'name of choice', count:12, choices:[{id: 116, name:'name1', count:5}, {id: 226, name:'name1', count:5}, {id: 336, name:'name1', count:5}, {id: 446, name:'name1', count:5}]}, {id: 16, name:'name of choice', count:12, choices:[{id: 556, name:'name1', count:5}, {id: 666, name:'name1', count:5}, {id: 776, name:'name1', count:5}, {id: 886, name:'name1', count:5}]}, {id: 26, name:'name of choice', count:12, choices:[{id: 996, name:'name1', count:5}, {id: 106, name:'name1', count:5}, {id: 126, name:'name1', count:5}, {id: 136, name:'name1', count:5}]}, {id: 36, name:'name of choice', count:12, choices:[{id: 146, name:'name1', count:5}, {id: 156, name:'name1', count:5}, {id: 166, name:'name1', count:5}, {id: 176, name:'name1', count:5}]}], show: false},
                            {id: 7, title:'title7', body:'body7', headCount:'3800 رای', voteData: [{id: 07, name:'name of choice', count:12, choices:[{id: 117, name:'name1', count:5}, {id: 227, name:'name1', count:5}, {id: 337, name:'name1', count:5}, {id: 447, name:'name1', count:5}]}, {id: 17, name:'name of choice', count:12, choices:[{id: 557, name:'name1', count:5}, {id: 667, name:'name1', count:5}, {id: 777, name:'name1', count:5}, {id: 887, name:'name1', count:5}]}, {id: 27, name:'name of choice', count:12, choices:[{id: 997, name:'name1', count:5}, {id: 107, name:'name1', count:5}, {id: 127, name:'name1', count:5}, {id: 137, name:'name1', count:5}]}, {id: 37, name:'name of choice', count:12, choices:[{id: 147, name:'name1', count:5}, {id: 157, name:'name1', count:5}, {id: 167, name:'name1', count:5}, {id: 177, name:'name1', count:5}]}], show: false},
                        ]"
                ></collapse-group>
                
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