<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Program Landing Page</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Include your custom CSS file -->
    <style>
        /* General Page Styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        header {
            position: relative; /* Position relative to allow for absolute positioning of content */
            color: white;
            text-align: center;
            padding: 20px;
            height: 500px; /* Set a fixed height for the header */
            display: flex; /* Use flexbox to align content */
            flex-direction: column; /* Stack items vertically */
            justify-content: center; /* Center content vertically */
            align-items: center; /* Center content horizontally */
            background-color: whitesmoke;
            /* background-image: url('{{ asset('images/cover1.jpg') }}');  */
            background-size: cover; /* Ensure the image covers the entire header */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Prevent the background image from repeating */
            overflow: hidden; /* Hide any overflow */
        }

        header h1, header p, header button {
            position: relative; /* Keep the text and buttons above the background image */
            z-index: 1; /* Ensure the content stays above the background */
        }

        header button {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
        }

        header button:hover {
            background-color: black;
        }

/* 
        header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        header p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        header button {
            background-color: #F5A623;
            background-color: #fdc800;
            font-weight: bold;
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
        }

        header button:hover {
            background-color: black;


        } */
        /* Sticky Header Section */
        .sticky-header {
            position: sticky; /* Make the section sticky */
            top: 0; /* Position it at the top of the viewport */
            background-color: white; /* Background color for contrast */
            padding: 5px 35px; /* Padding for the header */
            z-index: 1000; /* Ensure it stays above other elements */
            border-bottom: 1px solid #ddd; /* Border for visual separation */
            display: flex; /* Use flexbox to align items */
            justify-content: space-between; /* Space out items horizontally */
            align-items: center; /* Center items vertically */
        }

        /* Apply Now Button Styling */
        .apply-right {
            background-color: #fdc800;
            color: black;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            z-index: 1000;
        }

        .apply-right:hover {
            background-color: black;
        }


        .container {
            max-width: 600%;
        }

        /* Navigation Buttons */
        nav {
            display: flex;
            justify-content: center;
            background-color: #e0e0e0;
            padding: 15px;
            margin-bottom: 20px;
        }

        nav button {
            /* background-color: #007BFF; */
            background-color: #fdc800;
            font-weight: bold;
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
        }

        nav button:hover {
            background-color: #0056b3;
        }

        /* Sections Styling */
        section {
            padding: 20px;
            margin: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        section p, section ul {
            font-size: 16px;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        /* FAQ Accordion */
        .faq {
            margin-top: 20px;
        }

        .accordion {
            background-color: #4A90E2;
            color: white;
            cursor: pointer;
            padding: 15px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: background-color 0.3s ease;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .accordion:hover {
            background-color: #367bb7;
        }

        .panel {
            padding: 0 15px;
            display: none;
            background-color: white;
            overflow: hidden;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        /* Footer Styling */
        footer {
            background-color: #4A90E2;
            color: white;
            text-align: center;
            padding: 3px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>
    
        <!-- Header Section -->
        <header>
            <img class="cover" src="{{ asset('images/cover1.jpg') }}" alt="">
            <!-- <h1>Scholarship Program 2024</h1>
            <p>Empowering Your Future with Scholarships</p>
            <button onclick="window.location.href='#'">Apply Now</button>
            <button onclick="window.location.href='#'">Check Results</button> -->
        </header>
        <div class="sticky-header">
            <h3>Scholarship Program 2024</h3>
            <input type="button" class="apply-right" value="Apply Now">
        </div>
        <!-- Navigation Buttons Section -->
        <nav>
            <button onclick="scrollToSection('about')">About Program</button>
            <button onclick="scrollToSection('scholarships')">Scholarships</button>
            <button onclick="scrollToSection('faqs')">FAQs</button>
            <button onclick="scrollToSection('contact')">Contact Details</button>
            <button onclick="window.location.href='#'">Apply Now</button>
        </nav>

    <div class="container">
        <!-- About the Program Section -->
        <section id="about">
            <h2>About the Scholarship Program</h2>
            <p>Our scholarship program is designed to support bright and deserving students who demonstrate academic excellence, leadership potential, and a passion for making a difference in their communities...</p>
        </section>

        <!-- Eligibility Criteria Section -->
        <section>
            <h2>Eligibility Criteria</h2>
            <ul>
                <li>Must be currently enrolled in an accredited institution.</li>
                <li>Minimum GPA of 3.0 or equivalent.</li>
                <li>Open to all nationalities.</li>
                <li>Age between 18-30 years.</li>
            </ul>
        </section>

        <!-- FAQ Section -->
        <section id="faqs">
            <h2>Frequently Asked Questions</h2>
            <div class="faq">
                <button class="accordion">What is the application deadline?</button>
                <div class="panel">
                    <p>The deadline for applying is [date].</p>
                </div>
                <button class="accordion">How do I know if I'm eligible?</button>
                <div class="panel">
                    <p>Check the eligibility criteria listed above or contact us for more details.</p>
                </div>
                <!-- Add more FAQs as needed -->
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact">
            <h2>Contact Us</h2>
            <p>Email: scholarship@yourorganization.com</p>
            <p>Phone: +1 (123) 456-7890</p>
            <p>Address: 123 Scholarship Avenue, City, Country</p>
        </section>
    </div>

        <!-- Footer Section -->
        <footer>
            <p>© 2024 Scholarship Program. All rights reserved.</p>
        </footer>
    <script>
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            section.scrollIntoView({ behavior: 'smooth' });
        }

        const accordions = document.querySelectorAll('.accordion');
        accordions.forEach((accordion) => {
            accordion.addEventListener('click', function() {
                // Close all other panels
                accordions.forEach((otherAccordion) => {
                    if (otherAccordion !== this) {
                        otherAccordion.classList.remove('active');
                        otherAccordion.nextElementSibling.style.display = 'none';
                    }
                });

                // Toggle the clicked panel
                this.classList.toggle('active');
                const panel = this.nextElementSibling;
                if (panel.style.display === 'block') {
                    panel.style.display = 'none';
                } else {
                    panel.style.display = 'block';
                }
            });
        });
    </script>

</body>
</html>
