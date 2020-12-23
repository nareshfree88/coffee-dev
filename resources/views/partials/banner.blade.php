<!--banner code start-->
<script type="text/javascript">


    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();

        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }



    $(function () {

        var popupCookie = getCookie("popupFlyer");
        
        if (popupCookie == "") {
            setTimeout(function () {
                $('#ready_modal').modal('show');
             }, 2000);
                //expires after 1 day
                setCookie("popupFlyer", "Opened", 1);
        }
    });


</script>

<!-- Modal -->

<div class="modal fade bd-example-modal-lg" id="ready_modal" tabindex="-1" role="dialog" aria-labelledby="ready_modal_text" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 80%; height: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h2 align='center' class="modal-title" id="ready_modal_text">Welcome to Islands Cafe! 😊</h2> 

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
<!--banner code end-->
