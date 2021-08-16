<?php
    //Add database connection
    require_once('../auth.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Privacy Policy</title>
        <!-- Favicon -->
		<link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
        <link rel="icon" href="../img/icon.png" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/aboutus.css" rel="stylesheet">

            <!-------bootstrap css custom styling -> (OVERRIDE) <- --------------------->
        <style>
            .dropleft .dropdown-toggle::before{
                border-right: 0;
            }
            .dropdown-toggle::after{
                border-top: 0;
            }
        </style>
        <script src="../js/fontawesome.js"></script>
    </head>
    <body>
        <!-----------------------------------------nav bar-------------------------------------------------->
        <?php require_once('include/header.php'); ?>

        <!------------------------------------------main body section--------------------------------------------------->
        
        <div class="container glry" style="border-radius: 1.25rem">
            <div class="card shadow" style="padding-bottom: 20px; border-radius: 1.25rem; ">
                <div class="container p-5">
                    <h1><i class="fad fa-user-secret" style="color:crimson"></i> Privacy Policy for PIXWAVE</h1>

                    <p>At PIXWAVE, accessible from https://pixwave.tk/, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by PIXWAVE and how we use it.</p>

                    <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

                    <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in PIXWAVE. This policy is not applicable to any information collected offline or via channels other than this website.</p>

                    <h2><i class="fad fa-clipboard" style="color:darkblue"></i> Consent</h2>

                    <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

                    <h2><i class="fad fa-inbox-out" style="color:darkorchid"></i> Information we collect</h2>

                    <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
                    <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
                    <p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>

                    <h2><i class="fad fa-receipt" style="color:darkseagreen"></i> How we use your information</h2>

                    <p>We use the information we collect in various ways, including to:</p>

                    <ul>
                    <li>Provide, operate, and maintain our website</li>
                    <li>Improve, personalize, and expand our website</li>
                    <li>Understand and analyze how you use our website</li>
                    <li>Develop new products, services, features, and functionality</li>
                    <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
                    <li>Send you emails</li>
                    <li>Find and prevent fraud</li>
                    </ul>

                    <h2><i class="fad fa-warehouse" style="color:yellowgreen"></i> Log Files</h2>

                    <p>PIXWAVE follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>

                    <h2><i class="fad fa-cookie-bite" style="color:turquoise"></i> Cookies and Web Beacons</h2>

                    <p>Like any other website, PIXWAVE uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>

                    <h2><i class="fad fa-check-double" style="color:tomato"></i> CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>

                    <p>Under the CCPA, among other rights, California consumers have the right to:</p>
                    <p>Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
                    <p>Request that a business delete any personal data about the consumer that a business has collected.</p>
                    <p>Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
                    <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

                    <h2><i class="fad fa-lock-alt" style="color:darkorange"></i> GDPR Data Protection Rights</h2>

                    <p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
                    <p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
                    <p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
                    <p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
                    <p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
                    <p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
                    <p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
                    <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

                    <h2><i class="fad fa-baby" style="color:teal"></i> Children's Information</h2>

                    <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

                    <p>PIXWAVE does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>
                </div>
            </div>  
        </div>
        <?php require_once('include/footer.php'); ?>
    </body>
</html>