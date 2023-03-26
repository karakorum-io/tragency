<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
 <style>
     .tour-details-gallery .details p {
    color: #ffffff;
}
 </style>
<body>
    <?php include 'includes/header.php' ?>
    <?php
    $detail  = $detail->result()[0]; 
    $option  = $options->result()[0]; 
    ?>
      
    
      <div class="breadcrumb-area style-two jarallax" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-left">
                        <h4 class="page-title">Secure Checkout</h4>
                        <ul class="page-list">
                            <li>Checkout securely — it takes only a few minutes</li>
                        </ul>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
      <div class="tour-details-area mg-top--70">
        <div class="tour-details-gallery">
            <form action="<?=base_url()?>welcome/checkout_submit" method="post">
                <div class="container">
                  
                    <div class="row">
                         <div class="col-xl-8">
                            
                   <div class="widget tour-list-widget" style="    border-radius: 0.5rem;padding: 15px;border: 1px solid #e5e5e5;">
                       
                        <div class="single-destinations-list style-three">
                            <div class="thumb" style="    min-height: 115px;">
                                <img src="<?=base_url()?><?=$detail->image?>" alt="list">
                            </div>
                            <div class="details">
                               
                               
                                <h4 class="title"><b><?=$detail->name?></b></h4>
                              <p style="color: #000;"><i class="fa fa-clock-o" style="color: #8bc547;"></i> <?=$detail->duration?></p>
                            </div>
                        </div>
                       
                            <div class="widget-tour-list-meta">
                                <h4><b>Traveler Details</b></h4>
                                <p>Information we need to confirm your tour or activity</p>
                                
                                <div class="row">
                                    <div class="col-xl-12"><p><b>Lead Traveler (Adult)</b></p></div>
                                <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Title</div>
                                <div class="single-widget-search-input">
                                    <select name="title" required>
                                        <option value=""></option>
                                        <option>Mr</option>
                                        <option>Mrs</option>
                                        <option>Miss</option>
                                    </select>
                                </div>
                                </div>
                                 <div class="col-xl-6">
                                <div class="single-widget-search-input-title">First name</div>
                                <div class="single-widget-search-input">
                                    <input type="text" name="fname" class="form-control" required>
                                </div>
                                </div>
                                 <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Last name</div>
                                <div class="single-widget-search-input">
                                    <input type="text" name="lname" class="form-control" required>
                                </div>
                                </div>
                                  <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Your email address</div>
                                <div class="single-widget-search-input">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                </div>
                                  <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Phone Number</div>
                                <div class="single-widget-search-input">
                                     <div class="row">
                                    <div class="col-3 pr-sm-0">
<select name="countryCode" id="" required="" class="p-0" >
    <option data-countrycode="AE" value="971" >UAE (+971)</option>
<option data-countrycode="GB" value="44">UK (+44)</option>
<option data-countrycode="US" value="1" selected="">USA (+1)</option>
<optgroup label="Other countries"> 
<option data-countrycode="DZ" value="213">Algeria (+213)</option>
<option data-countrycode="AD" value="376">Andorra (+376)</option>
<option data-countrycode="AO" value="244">Angola (+244)</option>
<option data-countrycode="AI" value="1264">Anguilla (+1264)</option>
<option data-countrycode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
<option data-countrycode="AR" value="54">Argentina (+54)</option>
<option data-countrycode="AM" value="374">Armenia (+374)</option>
<option data-countrycode="AW" value="297">Aruba (+297)</option>
<option data-countrycode="AU" value="61">Australia (+61)</option>
<option data-countrycode="AT" value="43">Austria (+43)</option>
<option data-countrycode="AZ" value="994">Azerbaijan (+994)</option>
<option data-countrycode="BS" value="1242">Bahamas (+1242)</option>
<option data-countrycode="BH" value="973">Bahrain (+973)</option>
<option data-countrycode="BD" value="880">Bangladesh (+880)</option>
<option data-countrycode="BB" value="1246">Barbados (+1246)</option>
<option data-countrycode="BY" value="375">Belarus (+375)</option>
<option data-countrycode="BE" value="32">Belgium (+32)</option>
<option data-countrycode="BZ" value="501">Belize (+501)</option>
<option data-countrycode="BJ" value="229">Benin (+229)</option>
<option data-countrycode="BM" value="1441">Bermuda (+1441)</option>
<option data-countrycode="BT" value="975">Bhutan (+975)</option>
<option data-countrycode="BO" value="591">Bolivia (+591)</option>
<option data-countrycode="BA" value="387">Bosnia Herzegovina (+387)</option>
<option data-countrycode="BW" value="267">Botswana (+267)</option>
<option data-countrycode="BR" value="55">Brazil (+55)</option>
<option data-countrycode="BN" value="673">Brunei (+673)</option>
<option data-countrycode="BG" value="359">Bulgaria (+359)</option>
<option data-countrycode="BF" value="226">Burkina Faso (+226)</option>
<option data-countrycode="BI" value="257">Burundi (+257)</option>
<option data-countrycode="KH" value="855">Cambodia (+855)</option>
<option data-countrycode="CM" value="237">Cameroon (+237)</option>
<option data-countrycode="CA" value="1">Canada (+1)</option>
<option data-countrycode="CV" value="238">Cape Verde Islands (+238)</option>
<option data-countrycode="KY" value="1345">Cayman Islands (+1345)</option>
<option data-countrycode="CF" value="236">Central African Republic (+236)</option>
<option data-countrycode="CL" value="56">Chile (+56)</option>
<option data-countrycode="CN" value="86">China (+86)</option>
<option data-countrycode="CO" value="57">Colombia (+57)</option>
<option data-countrycode="KM" value="269">Comoros (+269)</option>
<option data-countrycode="CG" value="242">Congo (+242)</option>
<option data-countrycode="CK" value="682">Cook Islands (+682)</option>
<option data-countrycode="CR" value="506">Costa Rica (+506)</option>
<option data-countrycode="HR" value="385">Croatia (+385)</option>
<option data-countrycode="CU" value="53">Cuba (+53)</option>
<option data-countrycode="CY" value="90392">Cyprus North (+90392)</option>
<option data-countrycode="CY" value="357">Cyprus South (+357)</option>
<option data-countrycode="CZ" value="42">Czech Republic (+42)</option>
<option data-countrycode="DK" value="45">Denmark (+45)</option>
<option data-countrycode="DJ" value="253">Djibouti (+253)</option>
<option data-countrycode="DM" value="1809">Dominica (+1809)</option>
<option data-countrycode="DO" value="1809">Dominican Republic (+1809)</option>
<option data-countrycode="EC" value="593">Ecuador (+593)</option>
<option data-countrycode="EG" value="20">Egypt (+20)</option>
<option data-countrycode="SV" value="503">El Salvador (+503)</option>
<option data-countrycode="GQ" value="240">Equatorial Guinea (+240)</option>
<option data-countrycode="ER" value="291">Eritrea (+291)</option>
<option data-countrycode="EE" value="372">Estonia (+372)</option>
<option data-countrycode="ET" value="251">Ethiopia (+251)</option>
<option data-countrycode="FK" value="500">Falkland Islands (+500)</option>
<option data-countrycode="FO" value="298">Faroe Islands (+298)</option>
<option data-countrycode="FJ" value="679">Fiji (+679)</option>
<option data-countrycode="FI" value="358">Finland (+358)</option>
<option data-countrycode="FR" value="33">France (+33)</option>
<option data-countrycode="GF" value="594">French Guiana (+594)</option>
<option data-countrycode="PF" value="689">French Polynesia (+689)</option>
<option data-countrycode="GA" value="241">Gabon (+241)</option>
<option data-countrycode="GM" value="220">Gambia (+220)</option>
<option data-countrycode="GE" value="7880">Georgia (+7880)</option>
<option data-countrycode="DE" value="49">Germany (+49)</option>
<option data-countrycode="GH" value="233">Ghana (+233)</option>
<option data-countrycode="GI" value="350">Gibraltar (+350)</option>
<option data-countrycode="GR" value="30">Greece (+30)</option>
<option data-countrycode="GL" value="299">Greenland (+299)</option>
<option data-countrycode="GD" value="1473">Grenada (+1473)</option>
<option data-countrycode="GP" value="590">Guadeloupe (+590)</option>
<option data-countrycode="GU" value="671">Guam (+671)</option>
<option data-countrycode="GT" value="502">Guatemala (+502)</option>
<option data-countrycode="GN" value="224">Guinea (+224)</option>
<option data-countrycode="GW" value="245">Guinea - Bissau (+245)</option>
<option data-countrycode="GY" value="592">Guyana (+592)</option>
<option data-countrycode="HT" value="509">Haiti (+509)</option>
<option data-countrycode="HN" value="504">Honduras (+504)</option>
<option data-countrycode="HK" value="852">Hong Kong (+852)</option>
<option data-countrycode="HU" value="36">Hungary (+36)</option>
<option data-countrycode="IS" value="354">Iceland (+354)</option>
<option data-countrycode="IN" value="91">India (+91)</option>
<option data-countrycode="ID" value="62">Indonesia (+62)</option>
<option data-countrycode="IR" value="98">Iran (+98)</option>
<option data-countrycode="IQ" value="964">Iraq (+964)</option>
<option data-countrycode="IE" value="353">Ireland (+353)</option>
<option data-countrycode="IL" value="972">Israel (+972)</option>
<option data-countrycode="IT" value="39">Italy (+39)</option>
<option data-countrycode="JM" value="1876">Jamaica (+1876)</option>
<option data-countrycode="JP" value="81">Japan (+81)</option>
<option data-countrycode="JO" value="962">Jordan (+962)</option>
<option data-countrycode="KZ" value="7">Kazakhstan (+7)</option>
<option data-countrycode="KE" value="254">Kenya (+254)</option>
<option data-countrycode="KI" value="686">Kiribati (+686)</option>
<option data-countrycode="KP" value="850">Korea North (+850)</option>
<option data-countrycode="KR" value="82">Korea South (+82)</option>
<option data-countrycode="KW" value="965">Kuwait (+965)</option>
<option data-countrycode="KG" value="996">Kyrgyzstan (+996)</option>
<option data-countrycode="LA" value="856">Laos (+856)</option>
<option data-countrycode="LV" value="371">Latvia (+371)</option>
<option data-countrycode="LB" value="961">Lebanon (+961)</option>
<option data-countrycode="LS" value="266">Lesotho (+266)</option>
<option data-countrycode="LR" value="231">Liberia (+231)</option>
<option data-countrycode="LY" value="218">Libya (+218)</option>
<option data-countrycode="LI" value="417">Liechtenstein (+417)</option>
<option data-countrycode="LT" value="370">Lithuania (+370)</option>
<option data-countrycode="LU" value="352">Luxembourg (+352)</option>
<option data-countrycode="MO" value="853">Macao (+853)</option>
<option data-countrycode="MK" value="389">Macedonia (+389)</option>
<option data-countrycode="MG" value="261">Madagascar (+261)</option>
<option data-countrycode="MW" value="265">Malawi (+265)</option>
<option data-countrycode="MY" value="60">Malaysia (+60)</option>
<option data-countrycode="MV" value="960">Maldives (+960)</option>
<option data-countrycode="ML" value="223">Mali (+223)</option>
<option data-countrycode="MT" value="356">Malta (+356)</option>
<option data-countrycode="MH" value="692">Marshall Islands (+692)</option>
<option data-countrycode="MQ" value="596">Martinique (+596)</option>
<option data-countrycode="MR" value="222">Mauritania (+222)</option>
<option data-countrycode="YT" value="269">Mayotte (+269)</option>
<option data-countrycode="MX" value="52">Mexico (+52)</option>
<option data-countrycode="FM" value="691">Micronesia (+691)</option>
<option data-countrycode="MD" value="373">Moldova (+373)</option>
<option data-countrycode="MC" value="377">Monaco (+377)</option>
<option data-countrycode="MN" value="976">Mongolia (+976)</option>
<option data-countrycode="MS" value="1664">Montserrat (+1664)</option>
<option data-countrycode="MA" value="212">Morocco (+212)</option>
<option data-countrycode="MZ" value="258">Mozambique (+258)</option>
<option data-countrycode="MN" value="95">Myanmar (+95)</option>
<option data-countrycode="NA" value="264">Namibia (+264)</option>
<option data-countrycode="NR" value="674">Nauru (+674)</option>
<option data-countrycode="NP" value="977">Nepal (+977)</option>
<option data-countrycode="NL" value="31">Netherlands (+31)</option>
<option data-countrycode="NC" value="687">New Caledonia (+687)</option>
<option data-countrycode="NZ" value="64">New Zealand (+64)</option>
<option data-countrycode="NI" value="505">Nicaragua (+505)</option>
<option data-countrycode="NE" value="227">Niger (+227)</option>
<option data-countrycode="NG" value="234">Nigeria (+234)</option>
<option data-countrycode="NU" value="683">Niue (+683)</option>
<option data-countrycode="NF" value="672">Norfolk Islands (+672)</option>
<option data-countrycode="NP" value="670">Northern Marianas (+670)</option>
<option data-countrycode="NO" value="47">Norway (+47)</option>
<option data-countrycode="OM" value="968">Oman (+968)</option>
<option data-countrycode="PW" value="680">Palau (+680)</option>
<option data-countrycode="PA" value="507">Panama (+507)</option>
<option data-countrycode="PG" value="675">Papua New Guinea (+675)</option>
<option data-countrycode="PY" value="595">Paraguay (+595)</option>
<option data-countrycode="PE" value="51">Peru (+51)</option>
<option data-countrycode="PH" value="63">Philippines (+63)</option>
<option data-countrycode="PL" value="48">Poland (+48)</option>
<option data-countrycode="PT" value="351">Portugal (+351)</option>
<option data-countrycode="PR" value="1787">Puerto Rico (+1787)</option>
<option data-countrycode="QA" value="974">Qatar (+974)</option>
<option data-countrycode="RE" value="262">Reunion (+262)</option>
<option data-countrycode="RO" value="40">Romania (+40)</option>
<option data-countrycode="RU" value="7">Russia (+7)</option>
<option data-countrycode="RW" value="250">Rwanda (+250)</option>
<option data-countrycode="SM" value="378">San Marino (+378)</option>
<option data-countrycode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
<option data-countrycode="SA" value="966">Saudi Arabia (+966)</option>
<option data-countrycode="SN" value="221">Senegal (+221)</option>
<option data-countrycode="CS" value="381">Serbia (+381)</option>
<option data-countrycode="SC" value="248">Seychelles (+248)</option>
<option data-countrycode="SL" value="232">Sierra Leone (+232)</option>
<option data-countrycode="SG" value="65">Singapore (+65)</option>
<option data-countrycode="SK" value="421">Slovak Republic (+421)</option>
<option data-countrycode="SI" value="386">Slovenia (+386)</option>
<option data-countrycode="SB" value="677">Solomon Islands (+677)</option>
<option data-countrycode="SO" value="252">Somalia (+252)</option>
<option data-countrycode="ZA" value="27">South Africa (+27)</option>
<option data-countrycode="ES" value="34">Spain (+34)</option>
<option data-countrycode="LK" value="94">Sri Lanka (+94)</option>
<option data-countrycode="SH" value="290">St. Helena (+290)</option>
<option data-countrycode="KN" value="1869">St. Kitts (+1869)</option>
<option data-countrycode="SC" value="1758">St. Lucia (+1758)</option>
<option data-countrycode="SD" value="249">Sudan (+249)</option>
<option data-countrycode="SR" value="597">Suriname (+597)</option>
<option data-countrycode="SZ" value="268">Swaziland (+268)</option>
<option data-countrycode="SE" value="46">Sweden (+46)</option>
<option data-countrycode="CH" value="41">Switzerland (+41)</option>
<option data-countrycode="SI" value="963">Syria (+963)</option>
<option data-countrycode="TW" value="886">Taiwan (+886)</option>
<option data-countrycode="TJ" value="7">Tajikstan (+7)</option>
<option data-countrycode="TH" value="66">Thailand (+66)</option>
<option data-countrycode="TG" value="228">Togo (+228)</option>
<option data-countrycode="TO" value="676">Tonga (+676)</option>
<option data-countrycode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
<option data-countrycode="TN" value="216">Tunisia (+216)</option>
<option data-countrycode="TR" value="90">Turkey (+90)</option>
<option data-countrycode="TM" value="7">Turkmenistan (+7)</option>
<option data-countrycode="TM" value="993">Turkmenistan (+993)</option>
<option data-countrycode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
<option data-countrycode="TV" value="688">Tuvalu (+688)</option>
<option data-countrycode="UG" value="256">Uganda (+256)</option>

<option data-countrycode="UA" value="380">Ukraine (+380)</option>
<option data-countrycode="AE" value="971">United Arab Emirates (+971)</option>
<option data-countrycode="UY" value="598">Uruguay (+598)</option>

<option data-countrycode="UZ" value="7">Uzbekistan (+7)</option>
<option data-countrycode="VU" value="678">Vanuatu (+678)</option>
<option data-countrycode="VA" value="379">Vatican City (+379)</option>
<option data-countrycode="VE" value="58">Venezuela (+58)</option>
<option data-countrycode="VN" value="84">Vietnam (+84)</option>
<option data-countrycode="VG" value="84">Virgin Islands - British (+1284)</option>
<option data-countrycode="VI" value="84">Virgin Islands - US (+1340)</option>
<option data-countrycode="WF" value="681">Wallis &amp; Futuna (+681)</option>
<option data-countrycode="YE" value="969">Yemen (North)(+969)</option>
<option data-countrycode="YE" value="967">Yemen (South)(+967)</option>
<option data-countrycode="ZM" value="260">Zambia (+260)</option>
<option data-countrycode="ZW" value="263">Zimbabwe (+263)</option>
</optgroup>
</select>
</div><div class="col-9"><input type="tel" name="phone" placeholder="Phone"></div>
                                </div>
                                </div>
                                </div>
                                <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Nationality</div>
                                <div class="single-widget-search-input">
                                   <select name="nationality" required>
                                        <option value=""></option>
  <option value="afghan">Afghan</option>
  <option value="albanian">Albanian</option>
  <option value="algerian">Algerian</option>
  <option value="american">American</option>
  <option value="andorran">Andorran</option>
  <option value="angolan">Angolan</option>
  <option value="antiguans">Antiguans</option>
  <option value="argentinean">Argentinean</option>
  <option value="armenian">Armenian</option>
  <option value="australian">Australian</option>
  <option value="austrian">Austrian</option>
  <option value="azerbaijani">Azerbaijani</option>
  <option value="bahamian">Bahamian</option>
  <option value="bahraini">Bahraini</option>
  <option value="bangladeshi">Bangladeshi</option>
  <option value="barbadian">Barbadian</option>
  <option value="barbudans">Barbudans</option>
  <option value="batswana">Batswana</option>
  <option value="belarusian">Belarusian</option>
  <option value="belgian">Belgian</option>
  <option value="belizean">Belizean</option>
  <option value="beninese">Beninese</option>
  <option value="bhutanese">Bhutanese</option>
  <option value="bolivian">Bolivian</option>
  <option value="bosnian">Bosnian</option>
  <option value="brazilian">Brazilian</option>
  <option value="british">British</option>
  <option value="bruneian">Bruneian</option>
  <option value="bulgarian">Bulgarian</option>
  <option value="burkinabe">Burkinabe</option>
  <option value="burmese">Burmese</option>
  <option value="burundian">Burundian</option>
  <option value="cambodian">Cambodian</option>
  <option value="cameroonian">Cameroonian</option>
  <option value="canadian">Canadian</option>
  <option value="cape verdean">Cape Verdean</option>
  <option value="central african">Central African</option>
  <option value="chadian">Chadian</option>
  <option value="chilean">Chilean</option>
  <option value="chinese">Chinese</option>
  <option value="colombian">Colombian</option>
  <option value="comoran">Comoran</option>
  <option value="congolese">Congolese</option>
  <option value="costa rican">Costa Rican</option>
  <option value="croatian">Croatian</option>
  <option value="cuban">Cuban</option>
  <option value="cypriot">Cypriot</option>
  <option value="czech">Czech</option>
  <option value="danish">Danish</option>
  <option value="djibouti">Djibouti</option>
  <option value="dominican">Dominican</option>
  <option value="dutch">Dutch</option>
  <option value="east timorese">East Timorese</option>
  <option value="ecuadorean">Ecuadorean</option>
  <option value="egyptian">Egyptian</option>
  <option value="emirian">Emirian</option>
  <option value="equatorial guinean">Equatorial Guinean</option>
  <option value="eritrean">Eritrean</option>
  <option value="estonian">Estonian</option>
  <option value="ethiopian">Ethiopian</option>
  <option value="fijian">Fijian</option>
  <option value="filipino">Filipino</option>
  <option value="finnish">Finnish</option>
  <option value="french">French</option>
  <option value="gabonese">Gabonese</option>
  <option value="gambian">Gambian</option>
  <option value="georgian">Georgian</option>
  <option value="german">German</option>
  <option value="ghanaian">Ghanaian</option>
  <option value="greek">Greek</option>
  <option value="grenadian">Grenadian</option>
  <option value="guatemalan">Guatemalan</option>
  <option value="guinea-bissauan">Guinea-Bissauan</option>
  <option value="guinean">Guinean</option>
  <option value="guyanese">Guyanese</option>
  <option value="haitian">Haitian</option>
  <option value="herzegovinian">Herzegovinian</option>
  <option value="honduran">Honduran</option>
  <option value="hungarian">Hungarian</option>
  <option value="icelander">Icelander</option>
  <option value="indian">Indian</option>
  <option value="indonesian">Indonesian</option>
  <option value="iranian">Iranian</option>
  <option value="iraqi">Iraqi</option>
  <option value="irish">Irish</option>
  <option value="israeli">Israeli</option>
  <option value="italian">Italian</option>
  <option value="ivorian">Ivorian</option>
  <option value="jamaican">Jamaican</option>
  <option value="japanese">Japanese</option>
  <option value="jordanian">Jordanian</option>
  <option value="kazakhstani">Kazakhstani</option>
  <option value="kenyan">Kenyan</option>
  <option value="kittian and nevisian">Kittian and Nevisian</option>
  <option value="kuwaiti">Kuwaiti</option>
  <option value="kyrgyz">Kyrgyz</option>
  <option value="laotian">Laotian</option>
  <option value="latvian">Latvian</option>
  <option value="lebanese">Lebanese</option>
  <option value="liberian">Liberian</option>
  <option value="libyan">Libyan</option>
  <option value="liechtensteiner">Liechtensteiner</option>
  <option value="lithuanian">Lithuanian</option>
  <option value="luxembourger">Luxembourger</option>
  <option value="macedonian">Macedonian</option>
  <option value="malagasy">Malagasy</option>
  <option value="malawian">Malawian</option>
  <option value="malaysian">Malaysian</option>
  <option value="maldivan">Maldivan</option>
  <option value="malian">Malian</option>
  <option value="maltese">Maltese</option>
  <option value="marshallese">Marshallese</option>
  <option value="mauritanian">Mauritanian</option>
  <option value="mauritian">Mauritian</option>
  <option value="mexican">Mexican</option>
  <option value="micronesian">Micronesian</option>
  <option value="moldovan">Moldovan</option>
  <option value="monacan">Monacan</option>
  <option value="mongolian">Mongolian</option>
  <option value="moroccan">Moroccan</option>
  <option value="mosotho">Mosotho</option>
  <option value="motswana">Motswana</option>
  <option value="mozambican">Mozambican</option>
  <option value="namibian">Namibian</option>
  <option value="nauruan">Nauruan</option>
  <option value="nepalese">Nepalese</option>
  <option value="new zealander">New Zealander</option>
  <option value="ni-vanuatu">Ni-Vanuatu</option>
  <option value="nicaraguan">Nicaraguan</option>
  <option value="nigerien">Nigerien</option>
  <option value="north korean">North Korean</option>
  <option value="northern irish">Northern Irish</option>
  <option value="norwegian">Norwegian</option>
  <option value="omani">Omani</option>
  <option value="pakistani">Pakistani</option>
  <option value="palauan">Palauan</option>
  <option value="panamanian">Panamanian</option>
  <option value="papua new guinean">Papua New Guinean</option>
  <option value="paraguayan">Paraguayan</option>
  <option value="peruvian">Peruvian</option>
  <option value="polish">Polish</option>
  <option value="portuguese">Portuguese</option>
  <option value="qatari">Qatari</option>
  <option value="romanian">Romanian</option>
  <option value="russian">Russian</option>
  <option value="rwandan">Rwandan</option>
  <option value="saint lucian">Saint Lucian</option>
  <option value="salvadoran">Salvadoran</option>
  <option value="samoan">Samoan</option>
  <option value="san marinese">San Marinese</option>
  <option value="sao tomean">Sao Tomean</option>
  <option value="saudi">Saudi</option>
  <option value="scottish">Scottish</option>
  <option value="senegalese">Senegalese</option>
  <option value="serbian">Serbian</option>
  <option value="seychellois">Seychellois</option>
  <option value="sierra leonean">Sierra Leonean</option>
  <option value="singaporean">Singaporean</option>
  <option value="slovakian">Slovakian</option>
  <option value="slovenian">Slovenian</option>
  <option value="solomon islander">Solomon Islander</option>
  <option value="somali">Somali</option>
  <option value="south african">South African</option>
  <option value="south korean">South Korean</option>
  <option value="spanish">Spanish</option>
  <option value="sri lankan">Sri Lankan</option>
  <option value="sudanese">Sudanese</option>
  <option value="surinamer">Surinamer</option>
  <option value="swazi">Swazi</option>
  <option value="swedish">Swedish</option>
  <option value="swiss">Swiss</option>
  <option value="syrian">Syrian</option>
  <option value="taiwanese">Taiwanese</option>
  <option value="tajik">Tajik</option>
  <option value="tanzanian">Tanzanian</option>
  <option value="thai">Thai</option>
  <option value="togolese">Togolese</option>
  <option value="tongan">Tongan</option>
  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
  <option value="tunisian">Tunisian</option>
  <option value="turkish">Turkish</option>
  <option value="tuvaluan">Tuvaluan</option>
  <option value="ugandan">Ugandan</option>
  <option value="ukrainian">Ukrainian</option>
  <option value="uruguayan">Uruguayan</option>
  <option value="uzbekistani">Uzbekistani</option>
  <option value="venezuelan">Venezuelan</option>
  <option value="vietnamese">Vietnamese</option>
  <option value="welsh">Welsh</option>
  <option value="yemenite">Yemenite</option>
  <option value="zambian">Zambian</option>
  <option value="zimbabwean">Zimbabwean</option>
                                   </select>
                                </div>
                                </div>
                                   <div class="col-xl-12">
                                <div class="single-widget-search-input-title">Your address</div>
                                <div class="single-widget-search-input">
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                                </div>
                                  <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Your City</div>
                                <div class="single-widget-search-input">
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                </div>
                                 <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Your State</div>
                                <div class="single-widget-search-input">
                                    <input type="text" name="state" class="form-control" required>
                                </div>
                                </div>
                                   <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Your Country</div>
                                <div class="single-widget-search-input">
                                    <input type="text" name="country" class="form-control" required>
                                </div>
                                </div>
                                 <div class="col-xl-6">
                                <div class="single-widget-search-input-title">Your Postal Code</div>
                                <div class="single-widget-search-input">
                                    <input type="text" name="postal_code" class="form-control" required>
                                </div>
                                </div>
                               
                            </div>
                        </div>
                        
                        <div class="widget-tour-list-meta mt-4">
                                <h4><b>Payment Options</b></h4>
                                <p>Pay securely—we use SSL encryption to keep your data safe</p>
                                
                                <div class="row">
                                    <div class="col-xl-12">
                                        <input type="radio" name="payment_type" value="pay_later"> Pay Later Book Now</div>
                                        
                                        <div class="col-xl-12">
                                        <input type="radio" name="payment_type" value="half_pay" > Pay Half and Book Now (<?=$settings->currency_symbol?><?=round($post['total']/2)?>)</div>
                                        <div class="col-xl-12">
                                        <input type="radio" name="payment_type" value="full_pay" > Make Full payment and Book Now (<?=$settings->currency_symbol?><?=$post['total']?>)</div>
                               
                     </div>
                    </div>
                                
                                
                                
                </div> 
                </div>
                        <div class="col-xl-4">
                          <div class="box">
                                
                            <div class="book-list-warp">
                                <h4><b>Review Order Details</b></h4>
                                <p class="book-list-content"><?=$detail->name?></p>
                                <p><?=date('M d, Y', strtotime($post['travel_date']))?></p>
                                <p><?=$option->title?> (<?=date('h:i a', strtotime($post['travel_time']))?>)</p>
                                 <p><?=$post['adult']?> Adult, <?=$post['child']?> Child, <?=$post['infant']?> Infant</p>
                                
                            </div>
                            <div class="tp-list-meta border-tp-solid">
                            <h3><b>Total:</b> <span><?=$settings->currency_symbol?><?=$post['total']?></span></h3>
                            
                            
                            
                           
    <input type="hidden" name="travel_time" value="<?=$post['travel_time']?>">
    <input type="hidden" name="adult" value="<?=$post['adult']?>">
    <input type="hidden" name="child" value="<?=$post['child']?>">
    <input type="hidden" name="infant" value="<?=$post['infant']?>">
    <input type="hidden" name="total" value="<?=$post['total']?>">
    <input type="hidden" name="travel_date" value="<?=$post['travel_date']?>">
    <input type="hidden" name="tour_id" value="<?=$post['tour_id']?>">
    <input type="hidden" name="option_id" value="<?=$post['option_id']?>">
    <input type="hidden" name="tour_name" value="<?=$detail->name?>">
    <input type="hidden" name="tour_title" value="<?=$option->title?>">
    
                             <button  type="submit" class="mt-3 btn btn-yellow w-100" style="font-size: 17px;font-weight: 700;">Book Now</button>
                            </div>
                        </div>   
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    <!--       <div class="video-area tp-video-area pd-top-110" >-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-8 offset-lg-2 align-self-center wow  fadeinright animated" data-wow-duration="1s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeinright;">-->
    <!--                <div class="section-title mb-lg-0 mb-4 text-center">-->
    <!--                    <h2 class="title mb-4">Awards  <span>And Recognition</span></h2>-->
    <!--                  <img src="https://stablenetwork.in/travel/assets/img/awards-min.png" alt="img">-->
    <!--                </div>-->
                
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--  </div>-->
 </div>
    <!-- tour list area End -->
  
    <?php include 'includes/footer.php' ?>
     
</body>
</html>