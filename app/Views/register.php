<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Register | Able Pro Dashboard Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />

    <meta name="author" content="Phoenixcoded" />
    <!-- [Favicon] icon -->
    <link rel="icon" href="/assets/images/favicon.svg" type="image/x-icon" />
    <!-- [Font] Family -->
    <link rel="stylesheet" href="/assets/fonts/inter/inter.css"
        id="main-font-link" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="/assets/fonts/phosphor/duotone/style.css" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="/assets/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="/assets/fonts/feather.css" />
    <link rel="stylesheet" href="/assets/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/fonts/material.css" />
    <link rel="stylesheet" href="/assets/css/style.css"
        id="main-style-link" />
    <link rel="stylesheet" href="/assets/css/style-preset.css" />
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true"
    data-pc-layout="color-header" data-pc-direction="ltr" data-pc-theme_contrast
    data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="page-loader">
        <div class="bar"></div>
    </div>
    <!-- [ Pre-loader ] End -->


    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="#"><img src="/assets/images/logo-dark.svg"
                                    alt="img" /></a>
                        </div>
                        <div class="card-body">
                            <div class="form-container">
                                <form id="registerform">


                                    <div class="mb-3">
                                        <select class="form-control" name="user_appellation" required>
                                            <option value="Prof.Dr.">Prof.Dr.</option>
                                            <option value="Doç.Dr.">Doç.Dr.</option>
                                            <option value="Yrd.Doç. Dr.">Yrd.Doç. Dr.</option>
                                            <option value="Dr.Öğr.Üyesi">Dr.Öğr.Üyesi</option>
                                            <option value="Araş.Gör.Dr.">Araş.Gör.Dr. </option>
                                            <option value="Araş.Gör.">Araş.Gör.</option>
                                            <option value="Öğr.Gör.Dr.">Öğr.Gör.Dr.</option>
                                            <option value="Öğr.Gör.">Öğr.Gör.</option>
                                            <option value="Diğer">Diğer</option>
                                        </select>
                                    </div>
                                    <!-- name Alanı -->
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="user_name" placeholder="Ad Soyad" required />
                                        <div class="error-message text-danger"></div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="user_gender" required>
                                            <option value="erkek">Erkek</option>
                                            <option value="kadin">Kadın</option>
                                        </select>
                                    </div>
                                    <!-- phone Alanı -->
                                    <div class="mb-3">
                                        <div class="input-group" style="max-width: 350px; display: flex;">

                                            <!-- Ülke kodu seçimi -->
                                            <select class="form-select country-code" name="country_code" style="flex: 2; min-width: 80px;" required>
                                                <option value="+90" selected>🇹🇷 +90 (Türkiye)</option>
                                                <option value="+1">🇺🇸 +1 (USA)</option>
                                                <option value="+7">🇷🇺 +7 (Russia)</option>
                                                <option value="+20">🇪🇬 +20 (Egypt)</option>
                                                <option value="+27">🇿🇦 +27 (South Africa)</option>
                                                <option value="+30">🇬🇷 +30 (Greece)</option>
                                                <option value="+31">🇳🇱 +31 (Netherlands)</option>
                                                <option value="+32">🇧🇪 +32 (Belgium)</option>
                                                <option value="+33">🇫🇷 +33 (France)</option>
                                                <option value="+34">🇪🇸 +34 (Spain)</option>
                                                <option value="+36">🇭🇺 +36 (Hungary)</option>
                                                <option value="+39">🇮🇹 +39 (Italy)</option>
                                                <option value="+40">🇷🇴 +40 (Romania)</option>
                                                <option value="+41">🇨🇭 +41 (Switzerland)</option>
                                                <option value="+44">🇬🇧 +44 (United Kingdom)</option>
                                                <option value="+45">🇩🇰 +45 (Denmark)</option>
                                                <option value="+46">🇸🇪 +46 (Sweden)</option>
                                                <option value="+47">🇳🇴 +47 (Norway)</option>
                                                <option value="+48">🇵🇱 +48 (Poland)</option>
                                                <option value="+49">🇩🇪 +49 (Germany)</option>
                                                <option value="+51">🇵🇪 +51 (Peru)</option>
                                                <option value="+52">🇲🇽 +52 (Mexico)</option>
                                                <option value="+53">🇨🇺 +53 (Cuba)</option>
                                                <option value="+54">🇦🇷 +54 (Argentina)</option>
                                                <option value="+55">🇧🇷 +55 (Brazil)</option>
                                                <option value="+56">🇨🇱 +56 (Chile)</option>
                                                <option value="+57">🇨🇴 +57 (Colombia)</option>
                                                <option value="+58">🇻🇪 +58 (Venezuela)</option>
                                                <option value="+60">🇲🇾 +60 (Malaysia)</option>
                                                <option value="+61">🇦🇺 +61 (Australia)</option>
                                                <option value="+62">🇮🇩 +62 (Indonesia)</option>
                                                <option value="+63">🇵🇭 +63 (Philippines)</option>
                                                <option value="+64">🇳🇿 +64 (New Zealand)</option>
                                                <option value="+65">🇸🇬 +65 (Singapore)</option>
                                                <option value="+66">🇹🇭 +66 (Thailand)</option>
                                                <option value="+81">🇯🇵 +81 (Japan)</option>
                                                <option value="+82">🇰🇷 +82 (South Korea)</option>
                                                <option value="+84">🇻🇳 +84 (Vietnam)</option>
                                                <option value="+86">🇨🇳 +86 (China)</option>
                                                <option value="+91">🇮🇳 +91 (India)</option>
                                                <option value="+92">🇵🇰 +92 (Pakistan)</option>
                                                <option value="+93">🇦🇫 +93 (Afghanistan)</option>
                                                <option value="+94">🇱🇰 +94 (Sri Lanka)</option>
                                                <option value="+95">🇲🇲 +95 (Myanmar)</option>
                                                <option value="+98">🇮🇷 +98 (Iran)</option>
                                                <option value="+212">🇲🇦 +212 (Morocco)</option>
                                                <option value="+213">🇩🇿 +213 (Algeria)</option>
                                                <option value="+216">🇹🇳 +216 (Tunisia)</option>
                                                <option value="+218">🇱🇾 +218 (Libya)</option>
                                                <option value="+220">🇬🇲 +220 (Gambia)</option>
                                                <option value="+221">🇸🇳 +221 (Senegal)</option>
                                                <option value="+222">🇲🇷 +222 (Mauritania)</option>
                                                <option value="+223">🇲🇱 +223 (Mali)</option>
                                                <option value="+225">🇨🇮 +225 (Ivory Coast)</option>
                                                <option value="+226">🇧🇫 +226 (Burkina Faso)</option>
                                                <option value="+227">🇳🇪 +227 (Niger)</option>
                                                <option value="+228">🇹🇬 +228 (Togo)</option>
                                                <option value="+229">🇧🇯 +229 (Benin)</option>
                                            </select> 

                                            <!-- Telefon numarası -->
                                            <input type="text" class="form-control" name="user_phone" placeholder="Telefon Numarası"
                                                maxlength="15" style="flex: 3;" required />
                                            <div class="error-message text-danger"></div>
                                        </div>

                                    </div>

                                    <!-- mail Alanı -->
                                    <div class=" mb-3">
                                        <input type="email" class="form-control" name="user_mail" placeholder="Mail Adresi" required />
                                        <div class="error-message text-danger"></div>
                                    </div>
                                    <!-- Kurum -->
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="user_institution" placeholder="Kurum" required />
                                        <small id="institutionError" class="text-danger"></small>
                                    </div>
                                    <!-- ORC-ID Alanı -->
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="user_orcid" placeholder="XXXX-XXXX-XXXX-XXXX"
                                            pattern="\d{4}-\d{4}-\d{4}-\d{4}" maxlength="19" />
                                        <div class="error-message text-danger"></div>
                                    </div>




                                    <!-- Password Alanı -->
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="user_password" id="password" placeholder="Şifre" required />
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">👁</button>
                                        </div>
                                        <div class="error-message text-danger"></div>
                                    </div>


                                    <!-- Register Alanı -->
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between align-items-end mt-4">
                                    <h6 class="f-w-500 mb-0">Zaten bir hesabım var</h6>
                                    <a href="logout" class="link-primary">Oturum Aç</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#registerform').on('submit', function(e) {
                    e.preventDefault();

                    var form_data = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('register/submit') ?>",
                        data: form_data,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(response) {
                            console.log("Sunucudan Gelen Yanıt:", response);

                            $(".error-message").text('').hide();

                            if (response.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Başarılı!',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                setTimeout(function() {
                                    window.location.href = response.redirect; // Kullanıcıyı kendi sayfasına yönlendir
                                }, 2000);
                            } else {
                                if (response.errors) {
                                    $.each(response.errors, function(field, message) {
                                        let inputElement = $('[name="' + field + '"]');
                                        if (inputElement.length) {
                                            let errorElement = inputElement.next('.error-message');
                                            if (errorElement.length) {
                                                errorElement.text(message).show();
                                            } else {
                                                inputElement.after('<div class="error-message text-danger">' + message + '</div>');
                                            }
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Hata!',
                                        text: response.message
                                    });
                                }
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("AJAX Hata Yanıtı:", jqXHR.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: 'Bir sorun oluştu. Lütfen tekrar deneyin.'
                            });
                        }
                    });
                });
            });
        </script>




        <script>
            document.getElementById("togglePassword").addEventListener("click", function() {
                let passwordField = document.getElementById("password");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    this.innerText = "🔒";
                } else {
                    passwordField.type = "password";
                    this.innerHTML = "👁";
                }
            });
        </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let phoneInput = document.querySelector('input[name="user_phone"]');
        let countryCodeSelect = document.querySelector('.country-code');

        // Ülkelere göre telefon numarası formatları
        let phoneFormatMap = {
            "+1": {
                placeholder: "XXXXXXXXXX",
                length: 10
            }, // ABD
            "+90": {
                placeholder: "5XXXXXXXXX",
                length: 10
            }, // Türkiye
            "+44": {
                placeholder: "7XXXXXXXXX",
                length: 10
            }, // İngiltere
            "+971": {
                placeholder: "5XXXXXXXX",
                length: 9
            }, // BAE
            "+86": {
                placeholder: "1XXXXXXXXXX",
                length: 11
            }, // Çin
            "+49": {
                placeholder: "1XXXXXXXXX",
                length: 10
            }, // Almanya
            "+33": {
                placeholder: "6XXXXXXXXX",
                length: 10
            }, // Fransa
            "+55": {
                placeholder: "9XXXXXXXXX",
                length: 11
            }, // Brezilya
            "+81": {
                placeholder: "7XXXXXXXXX",
                length: 10
            }, // Japonya
            "+91": {
                placeholder: "9XXXXXXXXX",
                length: 10
            }, // Hindistan
            "+61": {
                placeholder: "4XXXXXXXXX",
                length: 9
            }, // Avustralya
            "+7": {
                placeholder: "9XXXXXXXXX",
                length: 10
            } // Rusya
        };

        // Telefon numarasını sadece rakamlarla sınırla ve maksimum uzunluğu belirle
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '').slice(0, phoneInput.maxLength);
        });

        // Ülke kodu değiştiğinde placeholder ve pattern güncelle
        countryCodeSelect.addEventListener('change', function() {
            let countryCode = this.value || "+90"; // Eğer countryCodeSelect boşsa varsayılan olarak "+90" (Türkiye) ekle
            let format = phoneFormatMap[countryCode] || {
                placeholder: "XXXXXXXXXX",
                length: 10
            }; // Varsayılan 10 hane

            phoneInput.placeholder = format.placeholder;
            phoneInput.setAttribute("maxlength", format.length);
            phoneInput.setAttribute("pattern", `\\d{${format.length}}`);
        });

        // Sayfa yüklendiğinde varsayılan değerleri ayarla ve otomatik olarak +90 ekle
        let defaultFormat = phoneFormatMap[countryCodeSelect.value] || phoneFormatMap["+90"];
        phoneInput.placeholder = defaultFormat.placeholder;
        phoneInput.setAttribute("maxlength", defaultFormat.length);
        phoneInput.setAttribute("pattern", `\\d{${defaultFormat.length}}`);
        countryCodeSelect.value = "+90"; // Varsayılan olarak Türkiye'yi seç

    });
</script>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let orcidInput = document.querySelector('input[name="user_orcid"]');

                orcidInput.addEventListener('input', function(e) {
                    let value = this.value.replace(/\D/g, ''); // Sadece rakamları al
                    if (value.length > 16) {
                        value = value.slice(0, 16); // Maksimum 16 rakam
                    }

                    // XXXX-XXXX-XXXX-XXXX formatını uygula
                    let formattedValue = value.match(/.{1,4}/g)?.join('-') || value;

                    this.value = formattedValue;
                });

                // Kullanıcının yanlışlıkla '-' yazmasını engelle
                orcidInput.addEventListener('keydown', function(e) {
                    if (e.key === "-" || e.key === " ") {
                        e.preventDefault();
                    }
                });
            });
        </script>
        <script src="/assets/js/plugins/popper.min.js">
        </script>
        <script src="/assets/js/plugins/simplebar.min.js"></script>
        <script src="/assets/js/plugins/bootstrap.min.js"></script>
        <script src="/assets/js/fonts/custom-font.js"></script>
        <script src="/assets/js/pcoded.js"></script>
        <script src="/assets/js/plugins/feather.min.js"></script>
        <script src="/assets/js/plugins/sweetalert2.all.min.js"></script>
</body>
<!-- [Body] end -->

</html>