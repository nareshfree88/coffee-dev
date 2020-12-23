
<div class="col-sm-3">
                <ul class="account-links">
                    <li><a class="anchor-link" href="{{url('/profile')}}">Manage My Subscription</a></li>
                    <!--<li><a class="anchor-link" href="#">Grind selection</a></li>-->
                    <li><a class="anchor-link" href="{{url('/address-details')}}">Address Book</a></li>
                    <!--<li><a class="anchor-link" href="#">Shipping Method</a></li>-->
                    <!--<li><a class="anchor-link" href="#">Payment Method</a></li>-->
                    <li><a class="anchor-link" href="{{url('/order-history')}}">Order History</a></li>
                    <li><a class="anchor-link" href="{{url('giftSubscription-history')}}">Gift-Subscription History</a></li>
                    <li><a class="anchor-link" href="{{url('/account-info')}}">Account Information</a></li>
                    <li>
                        <!--<a href="#">Sign out</a>-->
                        <a class="anchor-link" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>