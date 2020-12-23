@extends('layouts.user_layouts.main')

@section('content')
<section class="inner-pages">
    <div class="help">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Advice and answers from the Islands Cafe team</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="">Get in touch at<b> </b><a href="mailto:aloha@islandscafe.ca" target="_blank"><b>aloha@islandscafe.ca</b></a><b> </b>if you don't find an answer here:</h4>
                <div class="panel-group" id="accordion">

                    <div class="panel panel-default">
                        <div class="panel-heading main-h">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Responsibility and Transparency</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="panel-group accordion2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent=".accordion2" href="#collapseOne-1">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                    Where does your coffee come from?</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne-1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Our main coffee labels are Ukulele and Lazy Afternoon. Ukulele is a blend of Hawaiian and Brazilian beans, and Lazy Afternoon is a blend of Hawaiian and Columbian Beans.</p>

                                                <p>Our single origin coffee “Surf” comes from coffee farms we discovered on surf travel. These areas include but are not limited to Costa Rica, Nicaragua, Sumatra, Mexica, Paru. Each Surf coffee label will identify its single origin. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent=".accordion2" href="#collapseOne-2">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                    Where is your coffee roasted?</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne-2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>All our coffee is roasted in house in White Rock, British Columbia when purchasing from Canada and Santa Barbra California when purchasing in the USA.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent=".accordion2" href="#collapseOne-3">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                    How often is your coffee roasted?</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne-3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>We roast our beans twice a week to ensure your getting the freshest coffee beans possible. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent=".accordion2" href="#collapseOne-4">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                    Can I return the coffee if I don’t like it?</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne-4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Yes, if your not satisfied with your purchase after trying it you can return it for a full refund. We ask you send back the original packaging and pay for return shipping.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent=".accordion2" href="#collapseOne-5">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                    Can I change my coffee subscription once I have already ordered?</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne-5" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Yes you can change the amounts of coffee you require and the type of coffee you want by cancelling your current subscription and starting a new one. You can cancel and make other account changes in the account profile section of our website. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent=".accordion2" href="#collapseOne-6">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                    Is my information shared with anyone else?</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne-6" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Absolutely not! We have a very secure site that uses the latest in cyber security and we do not participate in any programs which would share your personal information. </p>
                                            </div>
                                        </div>
                                    </div>

                                </div> 
                            </div>
                        </div>
                    </div>


                    
                   
                    <script>
                        $(document).ready(function () {
                            function toggleIcon(e) {
                                $(e.target)
                                        .prev('.panel-heading')
                                        .find(".more-less")
                                        .toggleClass('glyphicon-plus glyphicon-minus');
                            }
                            $('.panel-group').on('hidden.bs.collapse', toggleIcon);
                            $('.panel-group').on('shown.bs.collapse', toggleIcon);

                            $('.accordion2').on('hidden.bs.collapse', toggleIcon);
                            $('.accordion2').on('shown.bs.collapse', toggleIcon);
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection