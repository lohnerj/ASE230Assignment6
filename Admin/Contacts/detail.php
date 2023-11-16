<!DOCTYPE html>
<html>
<head>
    <title>Contact Requests</title>
</head>
<body>
    <h1>Contact Details</h1>
    <?php
    if (isset($_GET['type'])) {
        $buttonType = $_GET['type'];
        if ($buttonType === 'sendMessage') {
            echo "You clicked 'Send Message' button.";
        } elseif ($buttonType === 'showPhoneNumber') {
            echo "You clicked 'Phone Number' button.";
        } elseif ($buttonType === 'showAddress') {
            echo "You clicked 'Address' button.";
        }
    }
    ?>

    <section class="section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="name" class="text-muted form-label">Name</label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Enter name*">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="email" class="text-muted form-label">Email</label>
                        <input name="email" id="email" type="email" class="form-control" placeholder="Enter email*">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="subject" class="text-muted form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject.." />
                </div>
                <div class="mb-4 pb-2">
                    <label for="comments" class="text-muted form-label">Message</label>
                    <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter message..."></textarea>
                </div>
                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </section>

    <div class="col-lg-5 ms-lg-auto">
        <div class="mt-5 mt-lg-0">
            <img src="images/contact.png" alt="" class="img-fluid d-block" />
            <p class="text-muted mt-5 mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="mail"></i> Support@info.com</p>
            <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="phone"></i> +91 123 4556 789</p>
            <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="map-pin"></i> 2976 Edwards Street Rocky Mount, NC 27804</p>
        </div>
    </div>
</body>
</html>
