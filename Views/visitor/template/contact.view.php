
            <div class="content-blocks contact">
                <section class="content">
                    <div class="block-content">
                        <h3 class="block-title">CONTACT</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <form class="contact-form" action="?send=1" name="form-contact" method="post">
                                    <div class="form-control-wrap">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="fname" placeholder="Nom & Prénom*" name="name">
                                        </div>
                                        <div class="form-group mar-top-40">
                                            <input type="email" class="form-control" id="email" placeholder="Email *" name="mail" required>
                                        </div>
                                        <div class="form-group mar-top-60">
                                            <textarea class="form-control" rows="10" name="message" placeholder="Votre message" required></textarea>
                                        </div>
                                        <div class="form-group mar-top-40">
                                            <input type="submit" class="btn v7 " value="Envoyer">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-5 offset-md-1">
                                <div class="contact-content">
                                    <div class="contact-icon">
                                        <i class="ion-ios-location-outline"></i>
                                    </div>
                                    <div class="contact-details">
                                        <h5>Adresse</h5>
                                        <p>Paris</p>
                                    </div>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-icon">
                                        <i class="ion-ios-telephone-outline"></i>
                                    </div>
                                    <div class="contact-details">
                                        <h5>Téléphone</h5>
                                        <p> <a href="tel:+4402920111222">07.08.08.05.10</a></p>
                                    </div>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-icon">
                                        <i class="ion-ios-email-outline"></i>
                                    </div>
                                    <div class="contact-details">
                                        <h5>Email</h5>
                                        <p>mohamed.bouhleel@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-blocks pop">
                <div id="close-pop" class="close-pop">Close <i class="ion-ios-close-empty"></i></div>
                <section class="content"></section>
            </div>
        </div>
        <?php   
                if(isset($_POST['mail']) && isset($_POST['message']) && isset($_POST['name'])){
                    if(isset($_GET['send']) && $_GET['send'] == 1)
                    {
                        $des = $_POST['mail'];
                        $to = "mohamed.bouhleel@gmail.com";
                        $subject = "Contact - Blog - ".$_POST['name'];
                        $txt = $_POST['message'];
                        $headers = "From: $des" . "\r\n" .
                        "CC: mohamed.bouhleel@gmail.com";
                        mail($to,$subject,$txt,$headers);    
                    }
                }
            
         ?>

   