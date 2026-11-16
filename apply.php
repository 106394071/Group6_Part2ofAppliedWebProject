<?php
    include("header.inc");
    include("nav.inc");
?>
    <main class="apply-main">
        <section class="apply-panel" aria-labelledby="apply-heading">
            <h2 id="apply-heading">Job Application</h2>
            <p class="apply-intro">
                We develop digital learning tools and platforms that support accessible and inclusive online education. Complete the form below to apply for an advertised position. Check the
                <a href="jobs.php">Job Descriptions</a> page and enter the matching job
                reference number.
            </p>
            <p class="required-note">
                <span class="required-marker" style="color: #a61b1b;">*</span>
                indicates a required field.
            </p>

            <!-- TODO: Check whether the course requires a student-specific formtest URL. -->
            <form class="apply-form" action="process_eoi.php" method="post">
                  action="https://mercury.swin.edu.au/it000000/formtest.php"
                  method="post">

                <div class="form-field">
                    <label for="job-reference">Job reference number <span class="required-marker">*</span></label>
                    <input type="text" id="job-reference" name="job_reference"
                           minlength="5" maxlength="5" pattern="[A-Za-z0-9]{5}"
                           title="Enter exactly 5 letters or numbers."
                           autocomplete="off" required>
                </div>

                <div class="form-field">
                    <label for="first-name">First name <span class="required-marker">*</span></label>
                    <input type="text" id="first-name" name="first_name"
                           maxlength="20" pattern="[A-Za-z]{1,20}"
                           title="Enter up to 20 alphabetic characters."
                           autocomplete="given-name" required>
                </div>

                <div class="form-field">
                    <label for="last-name">Last name <span class="required-marker">*</span></label>
                    <input type="text" id="last-name" name="last_name"
                           maxlength="20" pattern="[A-Za-z]{1,20}"
                           title="Enter up to 20 alphabetic characters."
                           autocomplete="family-name" required>
                </div>

                <div class="form-field">
                    <label for="date-of-birth">Date of birth (DD/MM/YYYY) <span class="required-marker">*</span></label>
                    <input type="text" id="date-of-birth" name="date_of_birth"
                           inputmode="numeric"
                           pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/[0-9]{4}"
                           placeholder="DD/MM/YYYY"
                           title="Enter the date in DD/MM/YYYY format."
                           autocomplete="bday" required>
                </div>

                <fieldset class="form-fieldset">
                    <legend>Gender <span class="required-marker">*</span></legend>
                    <div class="radio-options">
                        <label class="option-label" for="gender-female">
                            <input type="radio" id="gender-female" name="gender" value="Female" required>
                            Female
                        </label>
                        <label class="option-label" for="gender-male">
                            <input type="radio" id="gender-male" name="gender" value="Male" required>
                            Male
                        </label>
                        <label class="option-label" for="gender-other">
                            <input type="radio" id="gender-other" name="gender" value="Other" required>
                            Other
                        </label>
                        <label class="option-label" for="gender-undisclosed">
                            <input type="radio" id="gender-undisclosed" name="gender" value="Prefer not to say" required>
                            Prefer not to say
                        </label>
                    </div>
                </fieldset>

                <div class="form-field form-field--full">
                    <label for="street-address">Street address <span class="required-marker">*</span></label>
                    <input type="text" id="street-address" name="street_address"
                           maxlength="40" autocomplete="street-address" required>
                </div>

                <div class="form-field">
                    <label for="suburb-town">Suburb/Town <span class="required-marker">*</span></label>
                    <input type="text" id="suburb-town" name="suburb_town"
                           maxlength="40" autocomplete="address-level2" required>
                </div>

                <div class="form-field">
                    <label for="state">State <span class="required-marker">*</span></label>
                    <select id="state" name="state" autocomplete="address-level1" required>
                        <option value="" selected disabled>Select a state or territory</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </div>

                <div class="form-field">
                    <label for="postcode">Postcode <span class="required-marker">*</span></label>
                    <input type="text" id="postcode" name="postcode"
                           inputmode="numeric" pattern="[0-9]{4}"
                           minlength="4" maxlength="4"
                           title="Enter exactly 4 digits."
                           autocomplete="postal-code" required>
                </div>

                <div class="form-field">
                    <label for="email">Email <span class="required-marker">*</span></label>
                    <input type="email" id="email" name="email" autocomplete="email" required>
                </div>

                <div class="form-field">
                    <label for="phone">Phone number <span class="required-marker">*</span></label>
                    <input type="tel" id="phone" name="phone" inputmode="numeric"
                           pattern="[0-9]{8,12}" minlength="8" maxlength="12"
                           title="Enter 8 to 12 digits, without spaces."
                           autocomplete="tel" required>
                </div>

                <fieldset class="form-fieldset">
                    <legend>Skill list <span class="required-marker">*</span></legend>
                    <!-- These skills are relevant to the G04 EdTech industry. -->
                    <div class="skill-options">
                        <label class="option-label" for="skill-web-development">
                            <input type="checkbox" id="skill-web-development" name="skills[]" value="Web Development" required>
                            Web Development
                        </label>
                        <label class="option-label" for="skill-ui-ux-design">
                            <input type="checkbox" id="skill-ui-ux-design" name="skills[]" value="UI/UX Design" required>
                            UI/UX Design
                        </label>
                        <label class="option-label" for="skill-accessibility">
                            <input type="checkbox" id="skill-accessibility" name="skills[]" value="Accessibility and Inclusive Design" required>
                            Accessibility and Inclusive Design
                        </label>
                    </div>
                    <!-- Note: required on each checkbox means all listed options must be checked. -->
                </fieldset>

                <div class="form-field form-field--full">
                    <label for="other-skills">Other skills</label>
                    <textarea id="other-skills" name="other_skills" rows="5"
                              placeholder="Enter any other relevant skills (optional)."></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit">Submit application</button>
                    <button type="reset" class="reset-button">Clear form</button>
                </div>
            </form>
        </section>
    </main>
<?php
    include("footer.inc");
?>
