<?php $this->view('header'); ?>
<section class="app-form d-flex mt-5">
  <div class="container">
    <h3>Application Form</h3>
    
    
<form action="<?= base_url().'index.php/general/' ?>saveAppForm" method="post" role="form" class="app-formdiv">
  <p>General Information:</p>
              <div class="form-row">

                <div class="form-group col-md-3">

                  <label for="name">First Name <span class="req">*</span></label>
                  <input type="text" name="first_name" class="form-control" id="first_name" required />
                 
                </div>

                <div class="form-group col-md-3">
                  <label for="name">Middle Name <span class="req"></span></label>
                  <input type="text" name="middle_name" class="form-control" id="middle_name" />
                 
                </div>

                <div class="form-group col-md-3">
                  <label for="name">Last Name <span class="req">*</span></label>
                  <input type="text" name="last_name" class="form-control" id="last_name" required/>
                 
                </div>
                <div class="form-group col-md-3">
                  <label for="name"> Email Address <span class="req">*</span></label>
                   <input type="email" name="email" class="form-control" id="email" required/>
                </div>
              </div>
               <div class="form-row">
              <div class="form-group col-md-3">
                <label for="name"> Date of Birth<span class="req">*</span></label>
                <input type="date" class="form-control" name="date_of_birth" required/>
               
              </div>
        <div class="form-group col-md-3">
                <label for="name">Government ID <span class="req">*</span></label>
                <select class="form-control " name="proofofid" required>
                  <option>Aadhar Card</option>
                  <option>Pan Card</option>
                  <option>Voter ID</option>
                  <option>Driving License</option>
                  
               </select>
               
              </div>
              <div class="form-group col-md-3">
                <label for="name"> Country of Citizenship <span class="req">*</span></label>
               <select class="form-control " name="country_of_citizenship" required>
                  <option>India</option>
                  <option>America</option>
                  <option>UK</option>
                  <option>Sri Lanka</option>
                  
               </select>
               
              </div>
              <div class="form-group col-md-3 ">
                <label for="name">  Country of Residency<span class="req">*</span></label>
                <select class="form-control " name="residence" required>
                  <option>India</option>
                  <option>America</option>
                  <option>UK</option>
                  <option>Sri Lanka</option>
                  
               </select>
              </div>

              <div class="form-group col-md-3">
                <label for="name"> Primary Contact No.<span class="req">*</span></label>
                <input type="phone" name="primary_contact" class="form-control" required/>
               
              </div>

              <div class="form-group col-md-3">
                <label for="name"> Secondary Contact No.<span class="req"></span></label>
                <input type="phone" name="secondary_contact" class="form-control" required/>
               
              </div>
          </div>
          <hr>
          <p>Address Information:</p>
          <div class="form-row">
              <div class="form-group col-md-4">
                <label for="name">Street Address <span class="req">*</span></label>
                <input type="text" name="street_address" class="form-control" required/>
                
               
              </div>

              <div class="form-group col-md-4">
                <label for="name">Address Line1 <span class="req"></span></label>
                <input type="text" name="address_line1" class="form-control" required/>
                
               
              </div>

              <div class="form-group col-md-4">
                <label for="name">Address Line2 <span class="req"></span></label>
                <input type="text" name="address_line2" class="form-control" required/>
                
               
              </div>
          </div>
              <div class="form-row">

              <div class="form-group col-md-3">
                <label for="name">City <span class="req">*</span></label>
                <input type="text" name="city" class="form-control" required/>
                
               
              </div>
              <div class="form-group col-md-3">
                <label for="name">Country <span class="req">*</span></label>
                <select class="form-control "  name="country" required>
                  <option >India</option>
                  <option>America</option>
                  <option >UK</option>
                  <option>Sri Lanka</option>
                  
               </select>
                
               
              </div>
              <div class="form-group col-md-3">
                <label for="name">State / Province <span class="req">*</span></label>
                <select class="form-control "  name="state" required>
                  <option>Karnataka</option>
                  <option>Kerala</option>
                  <option>Tamilnadu</option>
                  <option>Andra Pradesh</option>
                  <option>Telangana</option>
                  <option>Madhya Pradesh</option>
                  <option>Uttar Pradesh</option>
                  <option>Punjab</option>
                  <option>Jammu and Kashmir</option>
                  <option>Rajasthan</option>
                  <option>West Bengal</option>
                  <option>Gujarat</option>
                  <option>Assam</option>
                  <option>Himachal Pradesh</option>
                  <option>Goa</option>
               </select>
                
               
              </div>

              <div class="form-group col-md-3">
                <label for="name">Postal Code <span class="req">*</span></label>
                <input type="text" name="postal_code" class="form-control" required/>
                
               
              </div>
          </div>
          <hr>
          <p>Course Details:</p>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Course You are looking for <span class="req">*</span></label>
               <select class="form-control "  name="looking_course" required>
                 <option disabled selected></option>
                  <option >Graphic Design</option>
                  <option >Web Design</option>
                  <option >UI / UX Design</option>
                  <option >3D Animation</option>
                  <option >VFX</option>
                  <option >Photography</option>
                  <option >Diploma In Animation</option>
                  <option >Diploma In Game Development</option>
                  <option >Diploma In VFX</option>
                  <option >Diploma In AR & VR</option>
                  <option >Bachelor Of Visual Arts</option>
               </select>
                
               
              </div>

              <div class="form-group col-md-6">
                <label for="name">Current Qualification <span class="req">*</span></label>
                <select class="form-control "  name="qualification" required>
                  <option >SSLC</option>
                  <option >PUC</option>
                  <option >UG</option>
                  <option >PG</option>
                  <option>Other</option>
               </select>
                
               
              </div>

              <!-- <div class="form-group col-md-4">
                <label for="name">Type <span class="req">*</span></label>
               <select class="form-control "  required>
                 <option disabled selected></option>
                  <option>Full Time</option>
                  <option>Part Time</option>
                  
                  
                  
               </select>
                
               
              </div> -->
          </div>
          
           
              <div class="text-center"><a href=""><button type="submit" class="btn btn-outline submit-btn">Submit</button></a></div>
            </form>

      </div>
    
  
</section><br><br>
<?php $this->view('footer'); ?>