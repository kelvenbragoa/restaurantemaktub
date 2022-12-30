<footer>
    <div class="wave footer"></div>
    <div class="container margin_60_40 fix_mobile">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_1">Ligações</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                       <!-- <li><a href="{{URL::to('/about')}}">Acerca de nós</a></li>-->
                        <li><a href="{{URL::to('/all-reviews')}}">Comentários</a></li>
                        <li><a href="{{URL::to('/home')}}">Minha conta</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_2">Métodos pagamento</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>
                        <li><a href="#">{{\App\Models\Settings::find(1)->company_bank_name1}} | {{\App\Models\Settings::find(1)->company_bank_account1}} </a></li>
                        <li><a href="#">{{\App\Models\Settings::find(1)->company_bank_name2}} | {{\App\Models\Settings::find(1)->company_bank_account2}}</a></li>
                        <li><a href="#">{{\App\Models\Settings::find(1)->company_bank_name3}} | {{\App\Models\Settings::find(1)->company_bank_account3}}</a></li>
                    
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-8">
                    <h3 data-target="#collapse_3">Contactos</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="icon_house_alt"></i>{{\App\Models\Settings::find(1)->company_address}}<br>{{\App\Models\Settings::find(1)->company_city}} - {{\App\Models\Settings::find(1)->company_province}}</li>
                        <li><i class="icon_mobile"></i>{{\App\Models\Settings::find(1)->company_mobile}}</li>
                        <li><i class="icon_mail_alt"></i><a href="#0">{{\App\Models\Settings::find(1)->company_email}}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-8">
                <h3 data-target="#collapse_3">Nosso Menu Digital</h3>
            <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                <div class="container">
                    <!-- generate function from simple-qr code package -->
              
                    {{QrCode::color(255, 0, 0)->generate('https://maktub.diveandcode.com/menu');}}
                  </div>
                
            </div>
        </div>
            <!--
            <div class="col-lg-3 col-md-6">
                    
                <div class="collapse dont-collapse-sm" id="collapse_4">
                   
                    <div class="follow_us">
                        <h5>Siga nos</h5>
                        <ul>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/twitter_icon.svg')}}" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/facebook_icon.svg')}}" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/instagram_icon.svg')}}" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/youtube_icon.svg')}}" alt="" class="lazy"></a></li>
                        </ul>
                    </div>
                </div>
            </div>-->
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
                    <!--<li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="English" selected>English</option>
                                <option value="French">French</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Russian">Russian</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select currency-selector">
                            <select>
                                <option value="US Dollars" selected>US Dollars</option>
                                <option value="Euro">Euro</option>
                            </select>
                        </div>
                    </li>-->
                    <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/cards_all.svg')}}" alt="" width="230" height="35" class="lazy"></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <!--<li><a href="{{URL::to('/terms')}}">Termos e condições / Privacidade</a></li>-->
                    <li><span>© {{\App\Models\Settings::find(1)->company_name}}</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->

<div id="toTop"></div><!-- Back to top button -->



<!-- COMMON SCRIPTS -->
<script src="{{asset('template/js/common_scripts.min.js')}}"></script>
<script src="{{asset('template/js/common_func.js')}}"></script>
<script src="{{asset('template/assets/validate.js')}}"></script>
<!-- SPECIFIC SCRIPTS -->
<script src="{{asset('template/js/specific_review.js')}}"></script>

<!-- Autocomplete -->
<script>
function initMap() {
var input = document.getElementById('autocomplete');
var autocomplete = new google.maps.places.Autocomplete(input);

autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
        window.alert("Autocomplete's returned place contains no geometry");
        return;
    }

    var address = '';
    if (place.address_components) {
        address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
    }
});
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap"></script>

</body>
</html>