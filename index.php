<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="index.html">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js">
    <title>Exercise 3</title>
</head>

<body>
    <header class="header-fix">
        <div class="header-container">
            <h1><i class="fa fa-table"></i> Form</h1>
        </div>
    </header>
    <div class="container">
        <section>
            <aside>
                <h2><i class="fa fa-question"></i>Info</h2>
                <ul>
                    <li><b>method:Post</b></li>
                    <li><b>Mandatory fields</b></li>
                    <li><b>Standard field: text and password</b></li>
                    <li><b>Checkbox: checkbox</b></li>
                    <li><b>Standard button: submit</b></li>
                </ul>
            </aside>
            <article>
                <h2>Login Form</h2>
                <p class="para">Standard form to enter these <strong>login credentials:</strong></p>
                <form action="index.php" method="post" class="form-element">
                    <div class="form-element-div">
                        <span>
                            <label>Enter your username:</label>
                            <input type="text" name="uname" autofocus required><br><br>
                            <label>Enter your password:</label>
                            <input type="password" name="pword" required><br>
                            <input type="checkbox" class="form-check">
                            <label>Remember me</label><br><br>
                            <input type="submit" value="Login" name="submit" class="forms-btn">
                        </span>
                    </div>
                </form>
            </article>
            <?php if (!empty($_POST) && $_POST['submit']) { ?>
                <div class="result">
                    <b>Values returned by the form:</b><br>
                    <ul>
                        <?php foreach ($_POST as $key => $value) {
                            echo '<li>' . $key . ' =>' . $value . '</li>';
                        } ?>
                    </ul>
                </div>
            <?php } ?>
        </section>


        <!-- Section 2-->
        <hr>
        <section>
            <aside>
                <h2><i class="fa fa-question"></i>Info</h2>
                <ul>
                    <li><b>method:POST</b></li>
                    <li><b>Mandatory fields</b></li>
                    <li><b>File sending</b></li>
                    <li><b>Standard field: text, email, date, file and password</b></li>
                    <li><b>Checkbox: checkbox</b></li>
                    <li><b>Radio button: submit</b></li>
                    <li><b>Standard button: submit</b></li>
                </ul>
            </aside>
            <article>
                <h2>Registration Form</h2>
                <p>Standard form for <strong>online registration</strong> on a website:</p>
                <form action="index.php" method="post" class="form-element" enctype="multipart/form-data">
                    <div class="form-element-div">
                        <span>
                            <!--radio input-->
                            <label for="Gender">Enter your <b>Gender:</b></label><text>*</text>
                            <input type="radio" name="gender" value="M" id="id5" required>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="F" required>
                            <label for="female">Female</label><br><br>

                            <!--text input-->
                            <label for="Lastname">Enter your <b>Lastname:</b></label><text>*</text>
                            <input type="text" name="lastname" id="id6" required><br><br>
                            <label for="Firstname">Enter your <b>Firstname:</b></label>
                            <input type="text" name="firstname" id="id7"><br><br>

                            <!--date input-->
                            <label for="Date">Enter your <b>Date of Birth:</b></label>
                            <input type="date" name="dob" id="id8" ><br><br>

                            <!--file input-->
                            <label for="File">Enter your <b>Photo:</b></label>
                            <input type="file" id="id9" name="myfile"><br><br>

                            <!--email input-->
                            <label for="Mail">Enter your <b>Email address:</b></label><text>*</text>
                            <input type="email" name="email" id="id10"  required><br><br>

                            <!--password input-->
                            <label for="Password">Enter your <b>Password:</b></label><text>*</text>
                            <input type="password" name="password" id="id11" required><br><br>
                            <label for="CPassword"><b>Confirm</b>your password:</label><text>*</text>
                            <input type="password" id="id12" required><br><br>
                            <text>*mandatory field</text><br>

                            <!--checkbox input-->
                            <input type="checkbox" name="tos" id="id13" required>
                            <label for="cb">Accept TOS</label><br><br>

                            <input type="submit" value="Registration" name="reg" class="forms-btn">
                        </span>
                    </div>
                </form>
            </article>
            <div class="results">
            <?php
            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get all user inputs
                $gender = $_POST['gender'] ?? '';
                $lastname = $_POST['lastname'] ?? '';
                $firstname = $_POST['firstname'] ?? '';
                $dob = $_POST['dob'] ?? '';
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                // Since passwords shouldn't be displayed, we won't include them in the displayed information
                $tosAccepted = isset($_POST['tos']) ? 'Ok' : 'Not Ok'; // Check if TOS is accepted
                $reg = $_POST['reg'] ?? '';

                // Display all user inputs
                echo "<h4>Values returned by the form:</h4>";
                echo "<ul>";
                echo "<li>Gender => $gender</li>";
                echo "<li>Lastname => $lastname</li>";
                echo "<li>Firstname => $firstname</li>";
                echo "<li>Date of Birth => $dob</li>";
                echo "<li>Email address => $email</li>";
                echo "<li>Password => $password</li>";
                echo "<li>Accept TOS => $tosAccepted</li>";
                echo "<li>Contact => $reg</li>";
                echo "</ul>";
            }
            ?>
            </div>
            <!--image upload-->
            <?php
            // Check if the form is submitted with an image file
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['myfile']) && $_FILES['myfile']['error'] === UPLOAD_ERR_OK) {
                // Define the target directory to save the uploaded image
                $target_dir = "uploads/";
                // Get the uploaded image's temporary name
                $tmp_name = $_FILES['myfile']['tmp_name'];
                // Generate a unique name for the image
                $target_file = $target_dir . uniqid() . '_' . basename($_FILES['myfile']['name']);
                // Move the uploaded image to the target directory
                if (move_uploaded_file($tmp_name, $target_file)) {
                    // Display the uploaded image
                    echo '<h4>Image preview:</h4>';
                    echo '<img src="' . $target_file . '" alt="Uploaded Image" >';
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            ?>
        </section>

        <!--Section 3--------------------------------------------------------->
        <hr>
        <section>
            <aside>
                <h2><i class="fa fa-question"></i>Info</h2>
                <ul>
                    <li><b>method:Post</b></li>
                    <li><b>Mandatory fields</b></li>
                    <li><b>Placeholder attribute</b></li>
                    <li><b>Textarea</b></li>
                    <li><b>Standard button: submit</b></li>
                </ul>
            </aside>
            <article>
                <h2>Contact Form</h2>
                <p>Standard form for making an<strong>information request</strong> on a website:</p>
                <form action="index.php" method="post" class="form-element">
                    <div class="form-element-div">
                        <span>
                            <!--department input-->
                            <label>Department you wish to contact:</label><text>*</text>
                            <select name="department" id="num4">
                                <option value="sales">Sales Department</option>
                                <option value="comm">Communication Department</option>
                                <option value="tech">Technical Department</option>
                            </select><br><br>

                            <!--title input-->
                            <label class="textlbl">Enter a <strong>Title:</strong></label><text>*</text>
                            <input type="text" id="num3" name="title" placeholder="More than 20 characters" minlength="20" required><br><br>

                            <!--textarea input-->
                            <label>Enter a <strong>Question:</strong></label><text>*</text>
                            <textarea name="comment" id="num2" cols="10" rows="10" maxlength="1000" placeholder="Maximum of 1000 characters..." required></textarea><br><br>

                            <!--email input-->
                            <label for="mail">Enter your <b>Email address:</b></label><text>*</text>
                            <input type="email" name="mail2" required placeholder="Your Email..." id="num1"><br><br>

                            <input type="submit" value="Contact" name="contact" id="forms-btn3">
                        </span>
                    </div>
                </form>
            </article>
        </section>

        <div class="results">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get all user inputs
                $department = $_POST['department'] ?? '';
                $title = $_POST['title'] ?? '';
                $comment = $_POST['comment'] ?? '';
                $mail2 = $_POST['mail2'] ?? '';
                $contact = $_POST['contact'] ?? '';

                // Display all user inputs
                echo "<h4>Values returned by the form:</h4>";
                echo "<ul>";
                echo "<li>Department => $department</li>";
                echo "<li>Title => $title</li>";
                echo "<li>Question => $comment</li>";
                echo "<li>Email => $mail2</li>";
                echo "<li>Contact => $contact</li>";
                echo "</ul>";
            }
            ?>
        </div>

    </div>
</body>

</html>