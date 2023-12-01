<?php require 'inc/header/header.php'; ?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="meetings.php">
                <i class="ri-building"></i>
                <span>Meetings</span>
            </a>
        </li><!-- End Meeting Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="jobs.php">
                <i class="bi bi-briefcase"></i>
                <span>Jobs</span>
            </a>
        </li><!-- End Jobs Page Nav -->

        <li class="nav-item">
            <div class="dropdown-center nav-link collapsed" style=" margin:0; padding:0; ">
                <button class="btn dropdown-toggle nav-link collapsed" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="outline: none;
      box-shadow: none;" onfocus="this.blur()">
                    <i class="bi bi-patch-check"></i>&nbsp;Resumes
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item nav-link collapsed" href="upload-cv-and-coverletter.php">Upload CV and Cover letter</a></li>
                    <li><a class="dropdown-item nav-link collapsed" href="create-resume.php">Create Resume</a></li>
                </ul>
            </div>

        </li><!-- End Resumes Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="contact.php">
                <i class="bi bi-envelope"></i>
                <span>Help Desk</span>
            </a>
        </li><!-- End Contact Page Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" href="logout.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Sign Out</span>
            </a>
        </li><!-- End suggestionin Page Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item ">Resumes</li>
                <li class="breadcrumb-item active">Create Resume</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <!-- ================================
    START CANDIDATE RESUME
================================= -->
        <section class="candidate-resume-area padding-top-100px padding-bottom-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="candidate-resume-wrap">
                            <div class="billing-form-item">
                                <div class="billing-title-wrap">
                                    <h3 class="widget-title pb-0">Basic Information</h3>
                                    <div class="title-shape margin-top-10px"></div>
                                </div><!-- billing-title-wrap -->
                                <div class="billing-content">
                                    <div class="contact-form-action">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">What's Your Name</label>
                                                        <div class="form-group">
                                                            <span class="la la-user form-icon"></span>
                                                            <input class="form-control" type="text" name="text" placeholder="Your name">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Profession Title</label>
                                                        <div class="form-group">
                                                            <span class="la la-pencil form-icon"></span>
                                                            <input class="form-control" type="text" name="text" placeholder="Headline (e.g. Front-end developer)">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Your Email</label>
                                                        <div class="form-group">
                                                            <span class="la la-envelope-o form-icon"></span>
                                                            <input class="form-control" type="text" name="text" placeholder="Email address">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Age</label>
                                                        <div class="form-group">
                                                            <span class="la la-user form-icon"></span>
                                                            <input class="form-control" type="text" name="text" placeholder="How old are you?">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Where do you live?</label>
                                                        <div class="form-group user-chosen-select-container">
                                                            <select class="user-chosen-select">
                                                                <option value>Select Location</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AX">Åland Islands</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="AD">Andorra</option>
                                                                <option value="AO">Angola</option>
                                                                <option value="AI">Anguilla</option>
                                                                <option value="AQ">Antarctica</option>
                                                                <option value="AG">Antigua &amp; Barbuda</option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AM">Armenia</option>
                                                                <option value="AW">Aruba</option>
                                                                <option value="AC">Ascension Island</option>
                                                                <option value="AU">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option>
                                                                <option value="BS">Bahamas</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BD">Bangladesh</option>
                                                                <option value="BB">Barbados</option>
                                                                <option value="BY">Belarus</option>
                                                                <option value="BE">Belgium</option>
                                                                <option value="BZ">Belize</option>
                                                                <option value="BJ">Benin</option>
                                                                <option value="BM">Bermuda</option>
                                                                <option value="BT">Bhutan</option>
                                                                <option value="BO">Bolivia</option>
                                                                <option value="BA">Bosnia &amp; Herzegovina</option>
                                                                <option value="BW">Botswana</option>
                                                                <option value="BV">Bouvet Island</option>
                                                                <option value="BR">Brazil</option>
                                                                <option value="IO">British Indian Ocean Territory</option>
                                                                <option value="VG">British Virgin Islands</option>
                                                                <option value="BN">Brunei</option>
                                                                <option value="BG">Bulgaria</option>
                                                                <option value="BF">Burkina Faso</option>
                                                                <option value="BI">Burundi</option>
                                                                <option value="KH">Cambodia</option>
                                                                <option value="CM">Cameroon</option>
                                                                <option value="CA">Canada</option>
                                                                <option value="CV">Cape Verde</option>
                                                                <option value="BQ">Caribbean Netherlands</option>
                                                                <option value="KY">Cayman Islands</option>
                                                                <option value="CF">Central African Republic</option>
                                                                <option value="TD">Chad</option>
                                                                <option value="CL">Chile</option>
                                                                <option value="CN">China</option>
                                                                <option value="CO">Colombia</option>
                                                                <option value="KM">Comoros</option>
                                                                <option value="CG">Congo - Brazzaville</option>
                                                                <option value="CD">Congo - Kinshasa</option>
                                                                <option value="CK">Cook Islands</option>
                                                                <option value="CR">Costa Rica</option>
                                                                <option value="CI">Côte d’Ivoire</option>
                                                                <option value="HR">Croatia</option>
                                                                <option value="CW">Curaçao</option>
                                                                <option value="CY">Cyprus</option>
                                                                <option value="CZ">Czechia</option>
                                                                <option value="DK">Denmark</option>
                                                                <option value="DJ">Djibouti</option>
                                                                <option value="DM">Dominica</option>
                                                                <option value="DO">Dominican Republic</option>
                                                                <option value="EC">Ecuador</option>
                                                                <option value="EG">Egypt</option>
                                                                <option value="SV">El Salvador</option>
                                                                <option value="GQ">Equatorial Guinea</option>
                                                                <option value="ER">Eritrea</option>
                                                                <option value="EE">Estonia</option>
                                                                <option value="SZ">Eswatini</option>
                                                                <option value="ET">Ethiopia</option>
                                                                <option value="FK">Falkland Islands</option>
                                                                <option value="FO">Faroe Islands</option>
                                                                <option value="FJ">Fiji</option>
                                                                <option value="FI">Finland</option>
                                                                <option value="FR">France</option>
                                                                <option value="GF">French Guiana</option>
                                                                <option value="PF">French Polynesia</option>
                                                                <option value="TF">French Southern Territories</option>
                                                                <option value="GA">Gabon</option>
                                                                <option value="GM">Gambia</option>
                                                                <option value="GE">Georgia</option>
                                                                <option value="DE">Germany</option>
                                                                <option value="GH">Ghana</option>
                                                                <option value="GI">Gibraltar</option>
                                                                <option value="GR">Greece</option>
                                                                <option value="GL">Greenland</option>
                                                                <option value="GD">Grenada</option>
                                                                <option value="GP">Guadeloupe</option>
                                                                <option value="GU">Guam</option>
                                                                <option value="GT">Guatemala</option>
                                                                <option value="GG">Guernsey</option>
                                                                <option value="GN">Guinea</option>
                                                                <option value="GW">Guinea-Bissau</option>
                                                                <option value="GY">Guyana</option>
                                                                <option value="HT">Haiti</option>
                                                                <option value="HN">Honduras</option>
                                                                <option value="HK">Hong Kong SAR China</option>
                                                                <option value="HU">Hungary</option>
                                                                <option value="IS">Iceland</option>
                                                                <option value="IN">India</option>
                                                                <option value="ID">Indonesia</option>
                                                                <option value="IR">Iran</option>
                                                                <option value="IQ">Iraq</option>
                                                                <option value="IE">Ireland</option>
                                                                <option value="IM">Isle of Man</option>
                                                                <option value="IL">Israel</option>
                                                                <option value="IT">Italy</option>
                                                                <option value="JM">Jamaica</option>
                                                                <option value="JP">Japan</option>
                                                                <option value="JE">Jersey</option>
                                                                <option value="JO">Jordan</option>
                                                                <option value="KZ">Kazakhstan</option>
                                                                <option value="KE">Kenya</option>
                                                                <option value="KI">Kiribati</option>
                                                                <option value="XK">Kosovo</option>
                                                                <option value="KW">Kuwait</option>
                                                                <option value="KG">Kyrgyzstan</option>
                                                                <option value="LA">Laos</option>
                                                                <option value="LV">Latvia</option>
                                                                <option value="LB">Lebanon</option>
                                                                <option value="LS">Lesotho</option>
                                                                <option value="LR">Liberia</option>
                                                                <option value="LY">Libya</option>
                                                                <option value="LI">Liechtenstein</option>
                                                                <option value="LT">Lithuania</option>
                                                                <option value="LU">Luxembourg</option>
                                                                <option value="MO">Macao SAR China</option>
                                                                <option value="MG">Madagascar</option>
                                                                <option value="MW">Malawi</option>
                                                                <option value="MY">Malaysia</option>
                                                                <option value="MV">Maldives</option>
                                                                <option value="ML">Mali</option>
                                                                <option value="MT">Malta</option>
                                                                <option value="MQ">Martinique</option>
                                                                <option value="MR">Mauritania</option>
                                                                <option value="MU">Mauritius</option>
                                                                <option value="YT">Mayotte</option>
                                                                <option value="MX">Mexico</option>
                                                                <option value="MD">Moldova</option>
                                                                <option value="MC">Monaco</option>
                                                                <option value="MN">Mongolia</option>
                                                                <option value="ME">Montenegro</option>
                                                                <option value="MS">Montserrat</option>
                                                                <option value="MA">Morocco</option>
                                                                <option value="MZ">Mozambique</option>
                                                                <option value="MM">Myanmar (Burma)</option>
                                                                <option value="NA">Namibia</option>
                                                                <option value="NR">Nauru</option>
                                                                <option value="NP">Nepal</option>
                                                                <option value="NL">Netherlands</option>
                                                                <option value="NC">New Caledonia</option>
                                                                <option value="NZ">New Zealand</option>
                                                                <option value="NI">Nicaragua</option>
                                                                <option value="NE">Niger</option>
                                                                <option value="NG">Nigeria</option>
                                                                <option value="NU">Niue</option>
                                                                <option value="MK">North Macedonia</option>
                                                                <option value="NO">Norway</option>
                                                                <option value="OM">Oman</option>
                                                                <option value="PK">Pakistan</option>
                                                                <option value="PS">Palestinian Territories</option>
                                                                <option value="PA">Panama</option>
                                                                <option value="PG">Papua New Guinea</option>
                                                                <option value="PY">Paraguay</option>
                                                                <option value="PE">Peru</option>
                                                                <option value="PH">Philippines</option>
                                                                <option value="PN">Pitcairn Islands</option>
                                                                <option value="PL">Poland</option>
                                                                <option value="PT">Portugal</option>
                                                                <option value="PR">Puerto Rico</option>
                                                                <option value="QA">Qatar</option>
                                                                <option value="RE">Réunion</option>
                                                                <option value="RO">Romania</option>
                                                                <option value="RU">Russia</option>
                                                                <option value="RW">Rwanda</option>
                                                                <option value="WS">Samoa</option>
                                                                <option value="SM">San Marino</option>
                                                                <option value="ST">São Tomé &amp; Príncipe</option>
                                                                <option value="SA">Saudi Arabia</option>
                                                                <option value="SN">Senegal</option>
                                                                <option value="RS">Serbia</option>
                                                                <option value="SC">Seychelles</option>
                                                                <option value="SL">Sierra Leone</option>
                                                                <option value="SG">Singapore</option>
                                                                <option value="SX">Sint Maarten</option>
                                                                <option value="SK">Slovakia</option>
                                                                <option value="SI">Slovenia</option>
                                                                <option value="SB">Solomon Islands</option>
                                                                <option value="SO">Somalia</option>
                                                                <option value="ZA">South Africa</option>
                                                                <option value="GS">South Georgia &amp; South Sandwich Islands</option>
                                                                <option value="KR">South Korea</option>
                                                                <option value="SS">South Sudan</option>
                                                                <option value="ES">Spain</option>
                                                                <option value="LK">Sri Lanka</option>
                                                                <option value="BL">St. Barthélemy</option>
                                                                <option value="SH">St. Helena</option>
                                                                <option value="KN">St. Kitts &amp; Nevis</option>
                                                                <option value="LC">St. Lucia</option>
                                                                <option value="MF">St. Martin</option>
                                                                <option value="PM">St. Pierre &amp; Miquelon</option>
                                                                <option value="VC">St. Vincent &amp; Grenadines</option>
                                                                <option value="SR">Suriname</option>
                                                                <option value="SJ">Svalbard &amp; Jan Mayen</option>
                                                                <option value="SE">Sweden</option>
                                                                <option value="CH">Switzerland</option>
                                                                <option value="TW">Taiwan</option>
                                                                <option value="TJ">Tajikistan</option>
                                                                <option value="TZ">Tanzania</option>
                                                                <option value="TH">Thailand</option>
                                                                <option value="TL">Timor-Leste</option>
                                                                <option value="TG">Togo</option>
                                                                <option value="TK">Tokelau</option>
                                                                <option value="TO">Tonga</option>
                                                                <option value="TT">Trinidad &amp; Tobago</option>
                                                                <option value="TA">Tristan da Cunha</option>
                                                                <option value="TN">Tunisia</option>
                                                                <option value="TR">Turkey</option>
                                                                <option value="TM">Turkmenistan</option>
                                                                <option value="TC">Turks &amp; Caicos Islands</option>
                                                                <option value="TV">Tuvalu</option>
                                                                <option value="UG">Uganda</option>
                                                                <option value="UA">Ukraine</option>
                                                                <option value="AE">United Arab Emirates</option>
                                                                <option value="GB">United Kingdom</option>
                                                                <option value="US">United States</option>
                                                                <option value="UY">Uruguay</option>
                                                                <option value="UZ">Uzbekistan</option>
                                                                <option value="VU">Vanuatu</option>
                                                                <option value="VA">Vatican City</option>
                                                                <option value="VE">Venezuela</option>
                                                                <option value="VN">Vietnam</option>
                                                                <option value="WF">Wallis &amp; Futuna</option>
                                                                <option value="EH">Western Sahara</option>
                                                                <option value="YE">Yemen</option>
                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Category</label>
                                                        <div class="form-group user-chosen-select-container">
                                                            <select class="user-chosen-select">
                                                                <option value>All Specialism</option>
                                                                <option value="1">Category 1</option>
                                                                <option value="2">Category 2</option>
                                                                <option value="3">Category 3</option>
                                                                <option value="4">Category 4</option>
                                                                <option value="5">Category 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Website <span class="text-muted ml-1">(optional)</span></label>
                                                        <div class="form-group">
                                                            <span class="la la-globe form-icon"></span>
                                                            <input class="form-control" type="text" name="text" placeholder="http://www.example.com/">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Salary</label>
                                                        <div class="form-group">
                                                            <span class="la la-dollar-sign form-icon"></span>
                                                            <input class="form-control" type="text" placeholder="e.g 25K">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Experience</label>
                                                        <div class="form-group user-chosen-select-container">
                                                            <select class="user-chosen-select">
                                                                <option value>Choose Experience</option>
                                                                <option value="1">No Experience</option>
                                                                <option value="2">Less than 1 Year</option>
                                                                <option value="3">1 to 2 Year(s)</option>
                                                                <option value="4">2 to 4 Year(s)</option>
                                                                <option value="5">3 to 5 Year(s)</option>
                                                                <option value="3">2 Year</option>
                                                                <option value="4">3 Year</option>
                                                                <option value="5">4 Year</option>
                                                                <option value="6">Over 5 Year</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Qualification</label>
                                                        <div class="form-group user-chosen-select-container">
                                                            <select class="user-chosen-select">
                                                                <option value>Choose Qualification</option>
                                                                <option value="1">No Experience</option>
                                                                <option value="2">Matriculation</option>
                                                                <option value="3">Intermediate</option>
                                                                <option value="4">Graduate</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Gender</label>
                                                        <div class="form-group user-chosen-select-container">
                                                            <select class="user-chosen-select">
                                                                <option value>Choose Gender</option>
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Skill Requirements <i class="la la-question tip ml-1" data-toggle="tooltip" data-placement="top" title="Add max 10 skills here"></i></label>
                                                        <div class="form-group user-chosen-select-container">
                                                            <select class="user-chosen-select" multiple>
                                                                <option>HTML5</option>
                                                                <option>CSS3</option>
                                                                <option>PHP</option>
                                                                <option>Javascript</option>
                                                                <option>Laravel</option>
                                                                <option>Photoshop</option>
                                                                <option>WordPress</option>
                                                                <option>Vuejs</option>
                                                                <option>React</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="label-text">Resume Description</label>
                                                        <div class="form-group">
                                                            <textarea class="user-text-editor-3" name="message"></textarea>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-4">
                                                    <div class="input-box">
                                                        <label class="label-text">Upload your photo <i class="la la-question tip ml-1" data-toggle="tooltip" data-placement="top" title="Max. file size: 10 MB"></i></label>
                                                        <div class="file-upload-wrap file-upload-wrap-2">
                                                            <input type="file" name="files[]" class="multi file-upload-input with-preview" multiple maxlength="1">
                                                            <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload Photo</span>
                                                        </div>
                                                    </div><!-- end col-lg-4 -->
                                                </div><!-- end col-lg-4 -->
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end contact-form-action -->
                                </div><!-- end billing-content -->
                            </div><!-- end billing-form-item -->
                            <div class="billing-form-item">
                                <div class="billing-title-wrap">
                                    <h3 class="widget-title pb-0">Education</h3>
                                    <div class="title-shape margin-top-10px"></div>
                                </div><!-- billing-title-wrap -->
                                <div class="billing-content pb-3">
                                    <div class="contact-form-action">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">School </label>
                                                        <div class="form-group">
                                                            <i class="la la-building-o form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g Warsaw high school">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Degree</label>
                                                        <div class="form-group">
                                                            <i class="la la-graduation-cap form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g Popular Master Degree Programs">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="label-text">Field of Study</label>
                                                        <div class="form-group">
                                                            <i class="la la-book form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g Warsaw University of Technology">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-12 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">From</label>
                                                        <div class="form-group">
                                                            <i class="la la-calendar form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g 2002">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">To</label>
                                                        <div class="form-group">
                                                            <i class="la la-calendar form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g 2019">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end contact-form-action -->
                                </div><!-- end billing-content -->
                            </div><!-- end billing-form-item -->
                            <div class="billing-form-item">
                                <div class="billing-title-wrap">
                                    <h3 class="widget-title pb-0">Work Experience</h3>
                                    <div class="title-shape margin-top-10px"></div>
                                </div><!-- billing-title-wrap -->
                                <div class="billing-content">
                                    <div class="contact-form-action">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Company Name</label>
                                                        <div class="form-group">
                                                            <i class="la la-building-o form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g Bluetech, Inc">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Job title</label>
                                                        <div class="form-group">
                                                            <i class="la la-graduation-cap form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g PHP Developer">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Date Form</label>
                                                        <div class="form-group">
                                                            <i class="la la-calendar form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g 2002">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Date To</label>
                                                        <div class="form-group">
                                                            <i class="la la-calendar form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="e.g 2019">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-12">
                                                    <div class="input-box">
                                                        <label class="label-text">Description</label>
                                                        <div class="form-group mb-0">
                                                            <textarea class="user-text-editor-4" name="message"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end contact-form-action -->
                                </div><!-- end billing-content -->
                            </div><!-- end billing-form-item -->
                            <div class="billing-form-item">
                                <div class="billing-title-wrap">
                                    <h3 class="widget-title pb-0">Social Accounts</h3>
                                    <div class="title-shape margin-top-10px"></div>
                                </div><!-- billing-title-wrap -->
                                <div class="billing-content">
                                    <div class="contact-form-action">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Facebook Link <span class="text-muted">(optional)</span></label>
                                                        <div class="form-group">
                                                            <i class="la la-facebook-f form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="https://www.facebook.com/">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Twitter Link <span class="text-muted">(optional)</span></label>
                                                        <div class="form-group">
                                                            <i class="la la-twitter form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="https://www.twitter.com/">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-box">
                                                        <label class="label-text">Email <span class="text-muted">(optional)</span></label>
                                                        <div class="form-group">
                                                            <i class="la la-envelopeat form-icon"></i>
                                                            <input class="form-control" type="text" name="text" placeholder="https://anyone@email.com">
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->

                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end contact-form-action -->
                                </div><!-- end billing-content -->
                            </div><!-- end billing-form-item -->
                            <div class="resume-submit-wrap">
                                <div class="btn-box mt-4">
                                    <button type="submit" class="theme-btn border-0"><i class="la la-plus"></i> Submit Your Resume</button>
                                </div><!-- end btn-box -->
                            </div><!-- end resume-submit-wrap -->
                        </div><!-- end candidate-resume-wrap -->
                    </div><!-- end col-lg-8 -->
                </div>
            </div>
        </section>
    </section>
</main>
<?php include 'inc/footer/footer.php'; ?>