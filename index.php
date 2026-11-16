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
                    <form action="jobs.html" method="get">
                        <input id="keyword" name="keyword" type="search"
                            aria-label="Search for job title" placeholder="Search for job title: e.g. Web Developer">
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
                    <tr>
                        <th colspan="2">Company Overview</th>
                    </tr>
                    <tr>
                        <th>Industry</th>
                        <td>Educational Technology</td>
                    </tr>
                    <tr>
                        <th>Our Mission</th>
                        <td>To create a digital environment that is accessible and inclusive for everyone.</td>
                    </tr>
                    <tr>
                        <th>Our Goal</th>
                        <td>To empower learners and build a brighter future through technology.</td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
<?php
    include("footer.inc");
?>   