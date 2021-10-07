@extends('layouts.app')

@section('content')
    
  <div class="card-block" style="margin-top: 100px;">
    <div class="col-sm-12 mt-1">
      @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif
    </div>
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"><span>&nbsp;</span></li>
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"><span>&nbsp;</span></li>
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"><span>&nbsp;</span></li>
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"><span>&nbsp;</span></li>
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"><span>&nbsp;</span></li>
      </ol>
      <div class="carousel-inner">
        <div class="shape-div">
          <img class="circle-1" alt="shape" src="{{ asset('images/circle-1.png') }}">
          <img class="circle-2" alt="shape" src="{{ asset('images/circle-2.png') }}">
          <img class="polygon-1" alt="shape" src="{{ asset('images/polygon-1.png') }}">
          <img class="polygon-2" alt="shape" src="{{ asset('images/polygon-2.png') }}">
        </div>
        <div class="carousel-item active">
          <img class="float-end wow bounceInRight" alt="Vision & Design" src="{{ asset('images/office365.png') }}" style="visibility: visible; animation-name: bounceInRight;margin-top: 15vh;">
          <div class="carousel-caption-div ">
            <div class="container-fluid">
              <h2>Office 365 Platform</h2>
              <p>Office 365 or Microsoft 365 is a cloud-based software as a service (SaaS) that enhances collaboration and productivity in work groups and companies.</p>
              <a class="btn" href="#office-365">Read More</a>
              <!-- <div class="links-div">
                <a href="https://www.a3logics.com/enterprise-application-development" class="btn wow fadeInUp" data-wow-duration="0.2s" data-wow-delay="1s" style="visibility: visible; animation-duration: 0.2s; animation-delay: 1s; animation-name: fadeInUp;">Enterprise Application Development</a>
                <a href="https://www.a3logics.com/software-integration-services" class="btn wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="1s" style="visibility: visible; animation-duration: 0.4s; animation-delay: 1s; animation-name: fadeInUp;">Software Integration Services</a>
                <a href="https://www.a3logics.com/digital-transformation" class="btn wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="1s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 1s; animation-name: fadeInUp;">Digital Transformation Services</a>
                <a href="https://www.a3logics.com/enterprise-data-management" class="btn wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="1s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 1s; animation-name: fadeInUp;">Enterprise Data Management</a>
              </div> -->
            </div>
          </div>
        </div>
        <div class="carousel-item slider-1">
          <img class="float-end wow bounceInRight" alt="Panels and Dashboards" src="{{ asset('images/panels-dashboards.png') }}" style="visibility: visible; animation-name: bounceInRight; margin-top: 20vh;">
          <div class="carousel-caption-div ">
            <div class="container-fluid">
              <h2 class="wow bounceInLeft" data-wow-duration="0.4" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: bounceInLeft;">Panels and Dashboards</h2>
              <p class="wow bounceInLeft" data-wow-duration="0.6" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: bounceInLeft;">We work from the design, development and implementation of Scorecards with Microsoft Power BI. Count on our team of experts in Microsoft 365, Dynamics 365 and Azure to make your projects a success.</p>
                <a data-wow-duration="0.8" data-wow-delay="0.8s" class="btn wow bounceInLeft" href="#panels-dashboards" style="visibility: visible; animation-delay: 0.8s; animation-name: bounceInLeft;">Read More</a>
            </div>
          </div>
        </div>
        <div class="carousel-item slider-2">
          <img class="float-end wow bounceInRight " alt="Database Programming" src="{{ asset('images/database-programming.png') }}" style="visibility: visible; animation-name: bounceInRight; margin-top: 20vh;">
          <div class="carousel-caption-div ">
            <div class="container-fluid">
              <h2>Database Programming</h2>
              <p>We work and develop with the following BD engines</p>
                <a class="btn" href="#database-programming">Read More</a>
            </div>
          </div>
        </div>
        <div class="carousel-item slider-3">
          <img class="float-end wow bounceInRight  animated" alt="Apps developmento for Android + iOS" src="{{ asset('images/android-ios.png') }}" style="visibility: visible; animation-name: bounceInRight; margin-top: 20vh;">
          <div class="carousel-caption-div ">
            <div class="container-fluid">
              <h2>Apps developmento for Android + iOS</h2>
              <p>We create custom mobile applications for iOS and Android from design to implementation..</p>
                <a class="btn" href="#android-ios">Read More</a>
            </div>
          </div>
        </div>
        <div class="carousel-item slider-4">
          <img class="float-end wow bounceInRight animated" alt="Custom software development" src="{{ asset('images/software-developement.png') }}" style="visibility: visible; animation-name: bounceInRight; margin-top: 20vh;">
          <div class="carousel-caption-div ">
            <div class="container-fluid">
              <h2>Custom software development</h2>
              <p>We have specialized professionals and highly productive work teams to carry out tasks in companies or remotely. We carry out different projects, using agile methodologies.</p>
              <a class="btn" href="#software-developement">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="best-it-consulting">
      <div class="shape-div">
        <img class="shape-1" alt="shape" src="{{ asset('images/shape-1.png') }}">
      </div>
      <div class="container-fluid">
        <div class="heading-block text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
          <h1>Vision & Design Company</h1>
          <h5>Consulting Group</h5>
        </div>
        <section class="unique-section" id="office-365">
          <div class="container-fluid">
             <div class="welcomes-unique-contant">
                <div class="row align-items-center">
                   <div class="col-lg-7">
                      <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                         <h2>Office 365 Platform</h2>
                         <p>Office 365 or Microsoft 365 is a cloud-based software as a service (SaaS) that enhances collaboration and productivity in work groups and companies.</p>
                         <p>Contains industry leading applications and services such as Microsoft Teams, SharePoint Online, Exchange Online in addition to the well-known Office applications on the market (Word, Excel, PowerPoint, Outlook and Access). </p>
                         <p>It is designed to enable teamwork and information flows while protecting data with a built-in world-class security layer. Key security solutions such as Identity and Access Management, Data Protection, Threat Protection, and Device Management are the foundations that support flexible, remote and secure work.</p>
                      </div>
                   </div>
                   <div class="col-lg-5 wow bounceInRight" style="visibility: visible; animation-name: bounceInRight;">
                      <img class="img-fluid" src="{{ asset('images/office365.png') }}" alt="Office 365 Platform">
                   </div>
                </div>
             </div>
          </div>
        </section>
        <section class="unique-section" id="panels-dashboards">
          <div class="container-fluid">
             <div class="welcomes-unique-contant">
                <div class="row align-items-center">
                   <div class="col-lg-5 wow bounceInLeft" style="visibility: visible; animation-name: bounceInLeft;">
                      <img class="img-fluid" src="{{ asset('images/panels-dashboards.png') }}" alt="Panels and Dashboards">
                   </div>
                   <div class="col-lg-7">
                      <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                         <h2>Panels and Dashboards</h2>
                         <p>We work from the design, development and implementation of Scorecards with Microsoft Power BI. Count on our team of experts in Microsoft 365, Dynamics 365 and Azure to make your projects a success.</p>
                         <p>We work from the design, development and implementation of Scorecards with Microsoft Power BI. Count on our team of experts in Microsoft 365, Dynamics 365 and Azure to make your projects a success.</p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
        </section>
        <section class="unique-section" id="database-programming">
          <div class="container-fluid">
             <div class="welcomes-unique-contant">
                <div class="row align-items-center">
                   <div class="col-lg-7">
                      <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                         <h2>Database Programming</h2>
                         <p>We work and develop with the following BD engines</p>
                         
                         <ul class="ul-left-align">
                           <li>SQL Server</li>
                           <li>Sqlite server</li>
                           <li>MongoDB</li>
                           <li>MySQl</li>
                           <li>wordPress</li>
                           <li>Firebase</li>
                         </ul>
                      </div>
                   </div>
                   <div class="col-lg-5 wow bounceInRight" style="visibility: visible; animation-name: bounceInRight;">
                      <img class="img-fluid" src="{{ asset('images/database-programming.png') }}" alt="Database Programming">
                   </div>
                </div>
             </div>
          </div>
        </section>
        <section class="unique-section" id="android-ios">
          <div class="container-fluid">
             <div class="welcomes-unique-contant">
                <div class="row align-items-center">
                   <div class="col-lg-5 wow bounceInLeft" style="visibility: visible; animation-name: bounceInLeft;">
                      <img class="img-fluid" src="{{ asset('images/android-ios.png') }}" alt="Apps development for Android & iOS">
                   </div>
                   <div class="col-lg-7">
                      <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                         <h2>Apps development for Android & iOS</h2>
                         <p>We create custom mobile applications for iOS and Android from design to implementation</p>
                         <p>We work with the following technologies</p>
                         <ul class="ul-left-align">
                         <li>iOS (native)</li>
                         <li>Android (native)</li>
                         <li>Flutter</li>
                         <li>React Native</li>
                         <li>Kotlin</li>
                         <li>Swift</li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
        </section>
        <section class="unique-section" id="software-developement">
          <div class="container-fluid">
             <div class="welcomes-unique-contant">
                <div class="row align-items-center">
                   <div class="col-lg-7">
                      <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                         <h2>Custom software development</h2>
                         <p>We have specialized professionals and highly productive work teams to carry out tasks in companies or remotely. We carry out different projects, using agile methodologies.</p>
                         <ul class="ul-left-align">
                           <li>Plataforma Microsoft.net (C# , VB.NET , Core , Web / Cliente Servidor)</li>
                           <li>Php</li>
                           <li>Laravel</li>
                           <li>Codeigniter</li>
                           <li>wordPress</li>
                           <li>Node</li>
                           <li>Html</li>
                           <li>CSS</li>
                           <li>Angularjs</li>
                           <li>Java</li>
                         </ul>
                      </div>
                   </div>
                   <div class="col-lg-5 wow bounceInRight" style="visibility: visible; animation-name: bounceInRight;">
                      <img class="img-fluid" src="{{ asset('images/software-developement.png') }}" alt="Custom software development">
                   </div>
                </div>
             </div>
          </div>
        </section>
      </div>
    </section>
    <section class="profitable-section">
      <div class="shape-div">
        <img class="circle-3" alt="shape" src="{{ asset('images/circle-3.png') }}">
        <img class="polygon-3" alt="shape" src="{{ asset('images/polygon-2.png') }}">
        <img class="circle-border" alt="shape" src="{{ asset('images/circle-border.png') }}">
        <span class="bg-shape-b">&nbsp;</span>
        <span class="bg-shape-w">&nbsp;</span>
      </div>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-5 wow bounceInRight" style="visibility: visible; animation-name: bounceInLeft;">
            <img class="img-fluid" src="{{ asset('images/artificial-inteligence.png') }}" alt="Artificial intelligence">
          </div>
          <div class="col-lg-7">
            <div class="heading-block text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <h2>Artificial intelligence</h2>
              <p>Today, Artificial Intelligence (AI) is more accessible than ever. No longer about sci-fi novels and billionaire futurists, artificial intelligence has been incorporated into companies of all sizes and verticals ranging from healthcare to hospitality to law enforcement.</p>
              <p>Get in touch with Chetu to discuss our AI software development services and start optimizing your business and automating processes today.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="unique-section" id="intelligence-business">
      <div class="container-fluid">
         <div class="welcomes-unique-contant">
            <div class="row align-items-center">
               <div class="col-lg-7">
                  <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                     <h2>Artificial Intelligence and Business Intelligence</h2>
                     <p>We use predictive artificial intelligence software to enhance host business intelligence (BI) software solutions, including tools for sales analytics, customer segmentation, marketing efforts, and logistics planning.</p>
                     
                     <p>We use AI to drive analytics and reporting software, allowing users to go beyond the "what" of KPI dashboards and visualizations to the "why."</p>
                  </div>
               </div>
               <div class="col-lg-5 wow bounceInRight" style="visibility: visible; animation-name: bounceInRight;">
                  <img class="img-fluid" src="{{ asset('images/business-intelligence.jpg') }}" alt="Artificial Intelligence and Business Intelligence">
               </div>
            </div>
         </div>
      </div>
    </section>
    <section class="unique-section" id="machine-learning">
      <div class="container-fluid">
         <div class="welcomes-unique-contant">
            <div class="row align-items-center">
               <div class="col-lg-5 wow bounceInLeft" style="visibility: visible; animation-name: bounceInLeft;">
                  <img class="img-fluid" src="{{ asset('images/machine-learnning.jpg') }}" alt="Machine Learning Solutions">
               </div>
               <div class="col-lg-7">
                  <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                     <h2>Machine Learning Solutions</h2>
                     <p>We program and integrate machine learning, deep learning, and artificial neural network software into your existing IT infrastructure, enabling you to find patterns in your business data and automate mission-critical processes.</p>
                     
                     <p>We use machine learning in industries as diverse as healthcare, marketing automation, finance, and banking.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>
    <section class="unique-section" id="robotic-process">
      <div class="container-fluid">
         <div class="welcomes-unique-contant">
            <div class="row align-items-center">
               <div class="col-lg-7">
                  <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                     <h2>Robotic Process Automation</h2>
                     <p>We integrate Robotic Process Automation (RPA) software into new or existing programs used in clerical and clerical work to automate standard processes.</p>
                     
                     <p>Builtin governance and change management tools ensure compliance with various industry standards. Our RPA services are applicable to individual platforms and multi-system infrastructures.</p>
                  </div>
               </div>
               <div class="col-lg-5 wow bounceInRight" style="visibility: visible; animation-name: bounceInRight;">
                  <img class="img-fluid" src="{{ asset('images/robotic-process.jpg') }}" alt="Robotic Process Automation">
               </div>
            </div>
         </div>
      </div>
    </section>
    <section class="unique-section" id="intelligence-document-recognition">
      <div class="container-fluid">
         <div class="welcomes-unique-contant">
            <div class="row align-items-center">
               <div class="col-lg-5 wow bounceInLeft" style="visibility: visible; animation-name: bounceInLeft;">
                  <img class="img-fluid" src="{{ asset('images/intelligent-document-recognition.png') }}" alt="Intelligent Document Recognition">
               </div>
               <div class="col-lg-7">
                  <div class="heading-block wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                     <h2>Intelligent Document Recognition</h2>
                     <p>Our Intelligent Document Recognition (IDR) software solutions are designed to quickly classify information and extract metadata from a wide range of document types.</p>
                     
                     <p>These include invoices, tax forms, applications, medical records, handwritten notes, and much more.</p>
                     <p>Our IDRs can also be used for multi-channel entry systems, such as business data repositories.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>
    <section class="counter-section" style="background-image: url(images/counter-bg.png);">
      <div class="container-fluid">
        <div class="row text-center justify-content-center">
          <div class="col-lg-8">
            <div class="heading-block text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <span>Consulting Group</span>
              <h2>Vision & Design</h2>
              <p>We are a Software-house that develop solutions to customers and to our Business Partners.</p>
            </div>
          </div>
          <div class="col-lg-12">
            <div id="counter">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-6 counter-Txt"><span class="counter-value" data-count="1285">1285</span>+ <p>Delivered Projects</p></div>
                <div class="col-lg-3 col-md-3 col-6 counter-Txt"><span class="counter-value" data-count="587">587</span> + <p>Clients Worldwide</p></div>
                <div class="col-lg-3 col-md-3 col-6 counter-Txt"><span class="counter-value" data-count="832">832</span>+ <p>Dedicated Professionals</p></div>
                <div class="col-lg-3 col-md-3 col-6 counter-Txt"><span class="counter-value" data-count="700">700</span>+ <p>Featured Articles</p></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-6 counter-Txt"><span class="counter-value" data-count="17">17</span>+ <p>Years in Operation</p></div>
                <div class="col-lg-3 col-md-3 col-6 counter-Txt"><span class="counter-value" data-count="15">15</span> + <p>Countries Served</p></div>
                <div class="col-lg-3 col-md-3 col-6 counter-Txt"><span class="counter-value" data-count="100">100</span>% <p>Quality Assurance</p></div>
                <div class="col-lg-3 col-md-3 col-6 counter-Txt"><span class="counter-value" data-count="91">91</span> % <p>Repeat Client-Ratio</p></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-section" id="contact-us">
      <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 wow bounceInLeft" style="visibility: visible; animation-name: bounceInLeft;">
              <div class="contact-inner">
                <div class="heading-block">
                    <h2>Our Information</h2>
                    <p style="color: #ffffff">Guaranteed response within 24 Hrs. No obligation quote</p>
                </div>
                <div class="contact-info">
                    <p><img class="flag" src="{{ asset('images/uklast.png') }}" alt="United States"> <span>USA</span></p>
                    <p><span>Call:</span><a href="tel:+1-510-404-8049"> +x-xxx-xxx-xxxx</a></p>
                    <p><span>Send Email:</span><a href="mailto:enquiry@a3logics.com"> company@email.com</a></p>
                </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 wow bounceInRight" style="visibility: visible; animation-name: bounceInRight;">
            <div class="heading-block">
                <h2>Contact Us</h2>
            </div>
            <div id="message_footer" style="text-align:center; padding-bottom: 15px; display: none;"></div>
            <form action="{{ route('contact') }}" method="POST" role="form" class="form-horizontal page contact_us_form" enctype="multipart/form-data" accept-charset="utf-8">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-sm-12 requireSign">
                  <input type="text" placeholder="Name" id="name" name="name" class="form-control">
                </div>
                <div class="col-sm-12">
                  <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control">
                </div>
                <div class="col-sm-12 requireSign">
                  <input type="email" placeholder="Email" id="email" name="email" class="form-control">
                </div>
                <div class="col-sm-12 requireSign">
                  <textarea placeholder="Your Message" rows="2" name="message" id="message" class="form-control"></textarea>
                </div>
                <div class="col-sm-12 mt-3">
                  <input type="submit" class="btn btn-primary center-block" value="Contact" style="width: 100%;">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
   <!--  <script type="text/javascript">
        var header_height = document.getElementById("header");
        header_height = (header_height == null  ? 0 : header_height.offsetHeight);
        console.log(header_height);
        var title_height = document.getElementById("page_title").offsetHeight;
        var search_height = document.getElementById("input_search_box").offsetHeight;
        var footer_height = document.getElementById("footer").offsetHeight;
        var content_height = window.innerHeight - header_height - title_height - search_height - footer_height- 45;
        document.getElementById("search_contents").setAttribute("style", "min-height: "+ content_height +"px");
    </script> -->
</html>
