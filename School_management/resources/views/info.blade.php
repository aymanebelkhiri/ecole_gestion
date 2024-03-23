info.blade.php : //// @extends('header')

@section('content')
<style>
    
    .info-container2 {
    padding: 10px;
    margin-top: 20px;
}

.info-container1 {
    padding: 10px;
    margin-top: 20px;
}
#map {
    height: 100%;
    width: 100%;
}

@media (max-width: 768px) {
    #map {
        height: 300px; /* Adjust height for smaller screens */
    }
}

    .sticky-top {
    position: sticky;
    top: 0;
    z-index: 1000; /* Ensure it's above other content */
    margin-top: 20px; /* Adjust the margin as needed */
}

.info-container {
    padding: 10px; /* Reduced padding */
    margin-top: 20px;
}

.card {
    width: 100%; /* Take full width of parent */
    max-width: 300px; /* Adjust maximum width as needed */
    margin: 0 auto; /* Center the card */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 10px; /* Reduced padding */
}

p {
    font-family: Arial, sans-serif;
    font-size: 14px; /* Reduced font size */
    line-height: 1.4; /* Reduced line height */
    color: #333;
}


    p::first-letter {
        color: #cd8303;
    }

    .navbar {
    position: fixed; /* Stick the navbar to the top */
    top: 80px; /* Position it below the element with height 60px */
    left: 0; /* Align it to the left */
    width: 100%; /* Full width */
    background-color: #343a40;
    padding: 10px 20px; /* Adjusted padding */
}

.navbar-nav {
    list-style: none; /* Remove default list styles */
    padding: 0;
    margin: 0;
    display: flex; /* Make the navbar items a flex container */
}

.nav-item {
    padding: 0 10px; /* Adjusted padding between items */
}

.nav-link {
    color: #fafafa;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 14px;
}

.nav-link:hover {
    color: #cd8303;
}

.navbar-nav .nav-link {
        color: #fafafa;
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s ease; /* Add transition effect */
        text-decoration: none;
        font-size: 14px;
    }

    .navbar-nav .nav-link.active {
        background-color: #cd8303; /* Change background color of active button */
    }

    .navbar-nav .nav-link:hover {
        background-color: #555; /* Change background color on hover */
    }

</style>

<br>
<br>
<br>
<br>
<br>
<br>
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav"> <!-- Center the navbar items -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#location" onclick="showText('location')">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mission" onclick="showText('mission')">Mission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#academic" onclick="showText('academic')">Academic Programs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#facilities" onclick="showText('facilities')">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#activities" onclick="showText('activities')">Extracurricular Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faculty" onclick="showText('faculty')">Faculty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#values" onclick="showText('values')">Values</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#partnership" onclick="showText('partnership')">Partnership</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#vision" onclick="showText('vision')">Vision</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="info-container" id="infoText">
    <p>Overall, Harmony Academy is more than just a school – it's a vibrant learning community where students are encouraged to dream big, pursue their passions, and make a positive impact on the world.</p>
</div>

<!-- Partnership Section -->
<div class="info-container1" id="partnershipSection" style="display: none;">
    <p>Our collaboration with partners enriches the educational experience. Here are some of our esteemed partners:</p>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="images/partner1.jpg" class="card-img-top" alt="Partner 1">
                <div class="card-body">
                    <h5 class="card-title">Rolls Royce</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/partner2.jpg" class="card-img-top" alt="Partner 2">
                <div class="card-body">
                    <h5 class="card-title">Bmce Bank</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/partner3.jpg" class="card-img-top" alt="Partner 3">
                <div class="card-body">
                    <h5 class="card-title">Koutoub</h5>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Location Section -->
<div class="info-container2" id="locationSection" style="display: none;">
    <div class="row">
        <div class="col-md-6">
            <p>Nestled in the picturesque countryside, Harmony Academy stands as a beacon of educational excellence, situated on sprawling acres of lush greenery. Located just a short drive away from the bustling city, the serene surroundings provide an ideal setting for students to focus on their studies and personal growth.</p>
        </div>
        <div class="col-md-6">
            <div id="map">
                <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


<script>
    function showText(section) {
        var text = '';
        switch (section) {
            case 'location':
                document.getElementById('locationSection').style.display = 'block';
                document.getElementById('partnershipSection').style.display = 'none';
                break;
            case 'mission':
                text = 'At Harmony Academy, our mission is to cultivate a diverse community of lifelong learners who are prepared to contribute positively to society. We foster a supportive and inclusive environment where students are encouraged to explore their passions, embrace challenges, and strive for excellence in all aspects of their lives.';
                document.getElementById('locationSection').style.display = 'none';
                document.getElementById('partnershipSection').style.display = 'none';
                break;
            case 'academic':
                text = 'Offering a comprehensive range of academic programs from kindergarten to high school, Harmony Academy is committed to providing a well-rounded education that prepares students for success in college and beyond. Our rigorous curriculum is designed to inspire intellectual curiosity, critical thinking, and creativity, while also emphasizing the importance of character development, leadership, and social responsibility.';
                document.getElementById('locationSection').style.display = 'none';
                document.getElementById('partnershipSection').style.display = 'none';
                break;
            case 'facilities':
                text = 'Our state-of-the-art facilities include modern classrooms equipped with the latest technology, science and computer labs, a library stocked with a vast collection of resources, art and music studios, athletic fields, and recreational areas. Additionally, our campus features eco-friendly initiatives such as solar panels and sustainable landscaping, reflecting our commitment to environmental stewardship.';
                document.getElementById('locationSection').style.display = 'none';
                document.getElementById('partnershipSection').style.display = 'none';
                break;
            case 'activities':
                text = 'Beyond academics, Harmony Academy offers a wide array of extracurricular activities to enrich students educational experience. From sports teams and clubs to community service projects and cultural events, there are countless opportunities for students to explore their interests, develop new skills, and form lasting friendships.';
                document.getElementById('locationSection').style.display = 'none';
                document.getElementById('partnershipSection').style.display = 'none';
                break;
            case 'faculty':
                text = 'Our dedicated team of experienced educators is passionate about teaching and committed to nurturing the potential of every student. With small class sizes and personalized attention, our faculty members foster a supportive learning environment where students feel valued, challenged, and inspired to reach their full potential.';
                document.getElementById('locationSection').style.display = 'none';
                document.getElementById('partnershipSection').style.display = 'none';
                break;
            case 'values':
                text = 'At Harmony Academy, we uphold values of integrity, respect, empathy, and collaboration. We believe in fostering a culture of mutual respect and understanding, where diversity is celebrated and every individual is valued for their unique contributions to our community.';
                document.getElementById('locationSection').style.display = 'none';
                document.getElementById('partnershipSection').style.display = 'none';
                break;
            case 'partnership':
                document.getElementById('partnershipSection').style.display = 'block';
                document.getElementById('locationSection').style.display = 'none';
                break;
            case 'vision':
                text = 'Our vision is to empower students to become compassionate, ethical leaders who are equipped to address the complex challenges of the 21st century and make a positive difference in the world. By nurturing a love of learning, fostering a spirit of inquiry, and instilling a sense of social responsibility, we aim to inspire our students to become lifelong learners and engaged global citizens.';
                document.getElementById('locationSection').style.display = 'none';
                document.getElementById('partnershipSection').style.display = 'none';
                break;
        }
        document.getElementById('infoText').innerHTML = '<p>' + text + '</p>';

        // Add 'active' class to the clicked navbar button
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        navLinks.forEach(function(link) {
            link.classList.remove('active'); // Remove 'active' class from all buttons
        });
        document.querySelector('a[href="#' + section + '"]').classList.add('active'); // Add 'active' class to clicked button
    }
</script>

@endsection