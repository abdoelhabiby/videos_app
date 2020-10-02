 <div class="section landing-section">
       <div class="container">
           <div class="row">
               <div class="col-md-8 ml-auto mr-auto">
                   <h2 class="text-center">contact us</h2>
                   <form class="contact-form" method="post" action="{{ route('front.contact-us.store') }}">
                       @csrf
                       <div class="row">
                           <div class="col-md-6">
                               <label>Name</label>
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text">
                                           <i class="nc-icon nc-single-02"></i>
                                       </span>
                                   </div>
                                   <input type="text" class="form-control" placeholder="Name" name="name">

                               </div>
                                <div class="error">
                                       @error('name')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                   </div>
                           </div>
                           <div class="col-md-6">
                               <label>Email</label>
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text">
                                           <i class="nc-icon nc-email-85"></i>
                                       </span>
                                   </div>
                                   <input type="text" class="form-control" placeholder="Email" name="email">

                               </div>
                                <div class="error">
                                       @error('email')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                   </div>
                           </div>
                       </div>
                       <label>Message</label>
                       <textarea class="form-control" name="message" rows="4"
                           placeholder="Tell us your thoughts and feelings..."></textarea>
                       @error('message')
                       <span class="text-danger">{{ $message }}</span>
                       @enderror
                       <div class="row">
                           <div class="col-md-4 ml-auto mr-auto">
                               <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
