<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link id="logo" rel="stylesheet" href="styles/styles.css">
</head>
<?php
include("header.inc");
include("nav.inc");
?>
<main>

    <section class="hero">
        <div>
            <div id="hero-content">
                <h2>Build a Brighter Future with Us.</h2>
                <p>We create innovative digital learning tools and platforms that make education accessible and
                    inclusive for everyone.</p>
                <form action="jobs.php" method="get">
                    <label for="keyword">Search for job title:</label>
                    <input id="keyword" name="keyword" type="search" placeholder="e.g. Web Developer">
                    <button type="submit">Search Jobs</button>
                </form>
            </div>
            <div><img src="styles/images/group-learning.jpg" alt="The team"></div>
        </div>
    </section>
    <section class="company-info">
        <div>
            <h2>About Our Company</h2>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Company Overview</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Industry</th>
                        <td>Educational Technology</td>
                    </tr>
                    <tr>
                        <th scope="row">Our Mission</th>
                        <td>To create a digital environment that is accessible and inclusive for everyone.</td>
                    </tr>
                    <tr>
                        <th scope="row">Our Goal</th>
                        <td>To empower learners and build a brighter future through technology.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php
include("footer.inc");
?>