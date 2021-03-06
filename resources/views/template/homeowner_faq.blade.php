{{-- * Template Name : Homeowner-FAQs * --}}

@extends('layouts.site.app')

@section('title')
    {!! isset($pageContent->meta_title) ? $pageContent->meta_title.' | 24Seven' : '24/Seven' !!}
@stop

@section('meta-keywords')
    {!! isset($pageContent->meta_keywords) ? $pageContent->meta_keywords : '24/Seven' !!}
@stop

@section('meta-description')
    {!! isset($pageContent->meta_description) ? $pageContent->meta_description : '24/Seven' !!}
@stop

@section('content')
 <!-- banner section start -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                {{-- <div class="image-wrap">
                    <div class="img-content">
                        <img src="{{ asset('assets/front_lib/images/Banner-2.png') }}" alt="">
                    </div>
                    <div class="overlay"></div>
                </div> --}}
                <div class="banner-content faq-aa">
                    <h3>STILL GOT QUERY? FAQS WILL HELP YOU</h3>
                    <p>Post your job for free. Match to tradespeople, get quotes and read reviews.</p>   
                </div>
            </div>
        </div>
    </section>
    <section class="faa-question">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mm-pp">
                        <p>General Questions</p>
                        <h3>Frequently Asked Questions (Homeowner)</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<div class="container">
        <div class="accordion" id="accordionExample">
            <button type="button" class="cus-btn-color btn-link collapsed row row" data-toggle="collapse" data-target="#collapseOne">Q: How do I post a job?</button>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        You can post a job in a variety of ways:
                    </p>	
                    <p> 
                        <strong>On the main website: </strong> <br> Visit our homepage at www.247tradespeople.com and select the type of work you need done in the web form on the left to get started. In a few short steps, the form will ask for your job details and contact information before submitting your job.
                    </p>	
                    <p> 
                        <strong>On our mobile website: </strong> <br> When you visit 24/7 Trades People on a mobile smartphone you will land on our mobile web form. Select the type of work you need done to get started and complete the short form to submit your job.
                    </p>
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link collapsed row row" data-toggle="collapse" data-target="#collapseTwo">Q: What should I include in my job posting?</button>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        The more information you can provide for our tradespeople, the better. We ask for your job type, postcode and approximate budget. In your job description, give additional details such as: <br>
                        when you want the work to start
                        <br>
                        whether you already have materials
                        <br>
                        the size of the room(s) or affected area(s)
                        <br>
                        the size and type of property
                        <br>
                        whether you have planning permission and/or drawings
                        <br>
                        whether your budget is flexible
                    </p>	
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link row collapsed" data-toggle="collapse" data-target="#collapseThree">Q: What if I???m just looking for a quote?</button>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Our tradespeople pay for the opportunity to quote, so to ensure the quality of the jobs on our site, we ask that you only post jobs that you intend to have completed.
                    </p>
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseFour">Q: Why do you need my name and contact details?</button>    
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Unlike directories or word-of-mouth where you are subject to the tradesperson you contact???s availability, 24/7 TradesPeople tradespeople view your job and request your details only if they are interested and available to carry out the work.
                    </p>
                    <p>	
                        To keep the market competitive and protect your personal information, a maximum of 3 tradespeople can view your name and contact details. So all you have to do is post your job and the tradespeople will come to you.
                    </p>
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseFive">Q: Which category should I choose for my job?</button>  
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    <p>	
                            If you???re not sure which category to post your job under, take a browse of our category listings here to see which job types are available under each category.
                    </p> 	
                </div>
            </div>
                
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseSix">Q: What happens after I post my job?</button>  
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        After you post your job, we???ll forward your job description to all relevant tradespeople in your area. Those who are interested in completing your job will pay to see your contact details and contact you to quote. To keep the market competitive and protect your personal information, only a maximum of 3 tradespeople can view your name and contact details.
                    </p>
                    <p>
                        We will send you the tradesperson???s details and reviews (via text message and or email) each time a tradesperson requests your contact details. If you have not been contacted by at least 1 tradesperson within 24 hours, consider updating your job description with more details or a revised budget.
                    </p>
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseSeven">Q: Will you publish my contact details when I post a job?</button> 
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        No. Your contact details will never be made public on the site. When a tradesperson buys your job, they will then get access to your details so that they may contact you to quote.
                    </p>
                    <p>
                        Note: To keep the market competitive and protect your personal information, only a maximum of 3 tradespeople can view your name and contact details.
                    </p>
                </div>
            </div>
                
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseEight">Q: Why do you ask for a budget?</button>     
            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Your budget helps us estimate the size of the job and set the price for tradespeople to quote on your job. Setting an approximate, but realistic, budget helps ensure that the right tradespeople contact you to quote.
                    </p>
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseNine">Q: Why have I been asked to update my job?</button>  
            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Our tradespeople usually respond to job postings within a few hours, so if no tradespeople have expressed interest in quoting on your job within 24 hours, we contact you to suggest that you update your job.
                    </p>
                    <p>	
                        Jobs with very short descriptions or unrealistic budgets often do not get a response from tradespeople. When we ask you to update your job, we suggest that you add more details or reconsider your budget.
                    </p>
                </div>
            </div>
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseTen">Q: How do I change/update a job I have posted?</button>  
            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        If you wish to change or update a job you have posted, log in to your account . Select ???My jobs??? from the main navigation to view the list of jobs you have posted through 24/7 TradesPeople. Click the job you wish to update and then the ???Update job??? button. Add any details you wish to append to your job description and click ???Update your job??? to submit changes.
                    </p>
                    <p>
                        If you received an email prompting you to update your job, you may click the update job link in the email to be taken directly the update screen for that job.
                    </p>
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseEleven">Q: Why can???t I update my job?</button>     
            <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        You cannot update your job if a tradesperson has already expressed interest in quoting or if you have already updated the job once before.
                    </p>
                </div>
            </div>
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapseTwelve">Q: Should I add photos to my job?</button>     
            <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Yes, if you have photos to add, you should. Photos of your job will help tradespeople better understand your job requirements and provide a more accurate quote. tradespeople are also more likely to respond to a job that includes extra information, such as photos.
                    </p>
                    <p>	
                            You should also add any plans, drawings or other images that could help the tradesperson better understand your requirements.
                    </p> 	
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse13">Q: How do I add photos to my job description?</button>     
            <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        You can add photos to your job description at any time by launching the site and selecting your job from the ???My Jobs??? section. Select ???Job Details??? and then one of the photo boxes to upload photos.
                    </p>	
                </div>
            </div>
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse14">Q: What if I don???t want three quotes?</button>     
            <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        If you have already selected a tradesperson or do not require any more quotes for any reason, please take down your job posting so that our tradespeople do not waste valuable time or money pursuing your job.
                    </p>	
                    <p>
                        To do so, log in to your account and select ???My jobs??? from the main navigation to view the list of jobs you have posted through 24/7 TradesPeople. Click the job you no longer require quotes for and click the ???Cancel job??? button.
                    </p>
                </div>
            </div>

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse15">Q: Do job postings expire?</button>     
            <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Yes. Jobs are only live in our system for 7 working days. We also take job postings down if 3 tradespeople have purchased them.
                    </p>	
                </div>
            </div>
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse16">Q: Can I cancel my job advertisement?</button>     
            <div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Yes. You can take down your job posting at any time by selecting ???My jobs??? from the main navigation. Click the job you don???t wish to advertise any longer and then click the ???Withdraw my job??? button at the bottom of the page.
                    </p>	
                    <p>
                        Note: You may still be contacted by any tradespeople who purchased your job before cancellation. Clicking ???Withdraw my job??? or ???Withdraw??? will not affect any arrangements you have already entered into with a tradesperson.
                    </p> 
                </div>
            </div>
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse17">Q: How do I cancel my job advertisement?</button>     
            <div id="collapse17" class="collapse" aria-labelledby="heading17" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        To take down your job posting, log in and select ???My jobs??? from the main navigation. Click the job you don???t wish to advertise any longer and then click the ???Withdraw my job??? button.
                    </p>	
                    <p>
                        Note: You may still be contacted by any tradespeople who purchased your job before cancellation. Clicking ???Withdraw my job??? or ???Withdraw??? will not affect any arrangements you have already entered into with a tradesperson.
                    </p>
                </div>
            </div>   
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse18">Q: What happens when I withdraw a job?</button>     
            <div id="collapse18" class="collapse" aria-labelledby="heading18" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        When you withdraw a job, no-one else will be able to see it.
                    </p>
                    <p>
                        If a tradesperson bought your job before you withdrew it, they will have your contact details so will still be able to get in touch.If a tradesperson bought your job before you withdrew it, they will have your contact details so will still be able to get in touch.
                    </p>
                </div>
            </div>
    
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse19">Q: Do I withdraw the job now or once the job???s done?</button>     
            <div id="collapse19" class="collapse" aria-labelledby="heading19" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        If you???ve found a tradesperson and agreed that they???ll do the work, or if you???ve decided not to go ahead with the work, you should withdraw the job. Tradespeople pay for the chance to quote, so if you leave your job up when you???ve already found someone, they???ll be wasting their hard-earned cash.
                    </p>
                </div>
            </div>   
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse20">Q: Can I still review or contact the tradesperson after withdrawing the job?</button>     
            <div id="collapse20" class="collapse" aria-labelledby="heading20" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        If a tradesperson said they wanted to give you a quote before you withdrew the job, you can still review and contact them. Bear in mind you can only review one tradesperson per job, so if one quoted and another quoted and did the work, you???d probably want to leave a review on the tradesperson who did the work.
                    </p>
                </div>
            </div>
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse21">Q: How should I choose a tradesperson?</button>     
            <div id="collapse21" class="collapse" aria-labelledby="heading21" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        After a tradesperson expresses interest in your job and pays to see your contact details, we send you their details and a link to their profile page and reviews.
                    </p>
                    <p>
                        You should visit the profile of each tradesperson we send you and review their qualifications, past work and, of course, reviews from other customers. This information plus your personal impression and the final quotes should help you make an informed choice of tradesperson for your job.	
                    </p>
                </div>
            </div>    

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse22">Q: How do I review the tradespeople interested in my job?</button>     
            <div id="collapse22" class="collapse" aria-labelledby="heading22" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        After a tradesperson expresses interest in your job and pays to see your contact details, we send you their details and a link to their profile page and reviewss. To review their reviews and profile, click the link in the email to view their profile.
                    </p>
                    <p>
                        You may also view the profile and reviews of the tradespeople interested in your job by logging in to your account online. Select ???My jobs??? from the main navigation and then click the job from the list. You will then be shown a list of tradespeople interested in your job and the links to their profile pages. We also add their details to your tradespeople dashboard.
                    </p>
                </div>
            </div> 

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse23">Q: Why have I been asked to contact the tradesperson?</button>     
            <div id="collapse23" class="collapse" aria-labelledby="heading23" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        After a tradesperson expresses interest in quoting on your job, they???ll be able to chat to you via the website or app, and they???ll also get your contact details. In the event that the tradesperson hasn???t been able to contact you, we???ll send you a message asking you to try contacting the tradesperson directly yourself.
                    </p>
                    <p>
                        Our tradespeople pay for the opportunity to quote on your job, so we ask that you please ensure that you allow them to do so.
                    </p>
                </div>
            </div>
            
            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse24">Q: How do I contact the tradespeople interested in my job?</button>     
                <div id="collapse24" class="collapse" aria-labelledby="heading24" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Up to 3 tradespeople can pay to access your job and get your contact information. You???ll be sent their contact details too, as well as their profile page on our site. You can use our chat feature through our app and website if you???d like to send messages back and forth. You can also call or email them directly.
                        </p>
                        <p>
                            You can also see their contact information by logging in to your account online. Select ???My jobs??? from the main navigation and then click the job from the list. You will then be shown a list of tradespeople interested in your job and their contact details. We also add their details to your tradespeople dashboard. 
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse25">Q: What do the stars beside the tradesperson???s information mean?</button>     
                <div id="collapse25" class="collapse" aria-labelledby="heading25" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            After a job has been completed, we ask all homeowners to review their tradesperson with 1 to 5 stars (5 being best) based on their quality of work, reliability and value for money. Each tradesperson is then given an overall 1 to 5 star reviews based on the average of all of their reviews on 24/7 TradesPeople.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse26">Q: How do I view reviews?</button>     
                <div id="collapse26" class="collapse" aria-labelledby="heading26" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            To view a tradesperson???s reviews, go to their profile page. Their most recent 3 reviews will be displayed on the main page. Click ???View More Reviewss??? at the bottom of this list to view the tradesperson???s full history of reviews with 24/7 TradesPeople.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse27">Q: How do you know that reviews are genuine?</button>     
                <div id="collapse27" class="collapse" aria-labelledby="heading27" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Unlike other recommendation sites, we operate a closed review system. Only people who have hired a tradesperson via 24/7 TradesPeople can submit a review of that specific tradesperson when the job has been finished. They can then come back and amend their review at any time and the tradesperson can comment/respond.	
                        </p>
                        <p>
                            We conduct spot checks on both positive and negative reviews to further ensure that you can confidently hire a tradesperson. Additionally, reviews are always screened for offensive language.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse28">Q: What if a tradesperson has no reviews?</button>     
                <div id="collapse28" class="collapse" aria-labelledby="heading28" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            tradespeople without reviews have most likely just joined 24/7 TradesPeople. Though they don???t have reviews yet, this doesn???t mean they???re not quality tradespeople. In fact, these tradespeople are incentivised to do a quality job to ensure that they get a brilliant first review, helping them build their reputation and win future work.
                        </p>
                        <p>
                            A good, quality tradesperson should have a portfolio of previous work. tradespeople can upload photos of past projects, qualifications and a description of their services on their 24/7 TradesPeople profile. We recommend you review their profile for this information and ask them for customer references.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse29">Q: What does Gas Safe mean?</button>     
                <div id="collapse29" class="collapse" aria-labelledby="heading29" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            By law, all tradespeople must be gas safe registered to carry out gas work. Gas Safe registered tradespeople carry a personal ID card which you should check for their licence number and expiry date. tradespeople are screened for this information when they join and only Gas Safe registered tradespeople are able to purchase and bid on these type of jobs.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse30">Q: What does Part P mean?</button>     
                <div id="collapse30" class="collapse" aria-labelledby="heading30" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            tradespeople must have a Part P qualification to do most electrical work on your property. Review their profile for this qualification and also ask to see proof of Part P credentials before allowing a tradesperson to carry out electrical work. Otherwise, you will need to contact your local building authority for certification.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse31">Q: Must I be contacted by 3 tradespeople before I choose one?</button>     
                <div id="collapse31" class="collapse" aria-labelledby="heading31" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            No. If you have already selected a tradesperson or do not require any more quotes for any reason, please take down your job posting so that our tradespeople do not waste valuable time or money pursuing your job.
                        </p>
                        <p>
                            To do so, log in to your account here and select ???My jobs??? from the main navigation to view the list of jobs you have posted through 24/7TradesPeople. Click the job you no longer require quotes for and click the ???Cancel job??? button.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse32">Q: What if I have already chosen a tradesperson?</button>     
                <div id="collapse32" class="collapse" aria-labelledby="heading32" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            If you have already selected a tradesperson or do not require any more quotes for any reason, please take down your job posting so that our tradespeople do not waste valuable time or money pursuing your job.
                        </p>
                        <p>
                            To do so, log in to your account here and select ???My jobs??? from the main navigation to view the list of jobs you have posted through 24/7 tradeseople. Click the job you no longer require quotes for and click the ???Cancel job??? button.	
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse33">Q: What do I do after I choose a tradesperson?</button>     
                <div id="collapse33" class="collapse" aria-labelledby="heading33" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            <strong> Once you???ve chosen your tradesperson, we ask you to do two things: </strong>
                        </p>
                        <p>
                            1.	Take down your job posting, if possible.
                        </p>
                        <p>
                            2.	Review your tradesperson when the work is complete.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse34">Q: What should I do if no tradespeople have contacted me?</button>     
                <div id="collapse34" class="collapse" aria-labelledby="heading22" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            Most jobs get serviced within hours of posting, but unfortunately due to seasonality and availability, some jobs do not always get the interest of our tradespeople. If you have not yet updated your job, try updating your job with more information and/or an adjusted budget.
                        </p>
                        <p>
                            If you have updated your job and still have no response, try posting your job again at a later date.
                        </p>
                        <p>
                            Note: Sometimes tradespeople express interest in quoting on your job but do not contact you straight away. If we have sent you a notification (email or SMS) that a tradesperson has expressed interest in your job, you may want to try contacting the tradesperson directly.
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse35">Q: What should I do if a tradesperson asks me to pay a deposit?</button>     
                <div id="collapse35" class="collapse" aria-labelledby="heading35" data-parent="#accordionExample">
                    <div class="card-body">
                        <p>
                            This is not uncommon as many tradespeople require an initial payment to help them cover the cost of materials, etc and get started. However, we never recommend paying the entire amount up front. The deposit should not be more than 20% of the overall job price and the tradesperson should be able to explain what it is covering (e.g. any initial costs).
                        </p>
                    </div>
                </div>
    

            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse36">Q: Should I review my tradesperson?</button>     
        <div id="collapse36" class="collapse" aria-labelledby="heading36" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    Yes. After the work is completed, we ask that you provide a review on the quality, value and reliability of your chosen tradesperson. Your review and feedback is a valuable tool for other users of 24/7 TradesPeople when evaluating their own tradespeople. Also, positive review are essential in helping good tradespeople build their business and secure future work.
                </p>
                <p>
                    If you are unsure about leaving a review for any reason (e.g. you???re worried about giving negative feedback), contact us with your feedback and an agent will get back to you with advice.
                </p>
            </div>
        </div>
    
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse37">Q: How do I leave a review?</button>     
        <div id="collapse37" class="collapse" aria-labelledby="heading37" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    After the work is completed, we ask that you review your chosen tradesperson.
                </p>
                <p>
                    To give a review, log in to your account and select ???My jobs??? from the main navigation to view the list of jobs you have posted through 24/7 Tradeseople. Select the job from the list and then click the ???Review??? button for the tradesperson who completed the work. You will then be asked to give the tradesperson a star review of 1 to 5 (5 being best) on their quality of work, reliability and value for money.
                </p>
                <p>
                    Note: Sometimes we or the tradesperson may send you a prompt to leave a review. Click the tradesperson/company name in this email and follow the instructions to leave your review.
                </p>
            </div>
        </div> 
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse38">Q: What do I do if I don???t want to leave a public review?</button>     
        <div id="collapse38" class="collapse" aria-labelledby="heading38" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    We highly encourage you to leave a review. Your review and feedback is a valuable tool for other users of  24/7 TradesPeople when evaluating their own tradespeople. Also, positive reviews are essential in helping good tradespeople build their business and secure future work.
                </p>
                <p>
                    However, if you are unsure about leaving a review for any reason (e.g. you???re worried about giving negative feedback), please contact us with your feedback. We are keen to hear about your experience and an agent will get back to you with advice and next steps.
                </p>
            </div>
        </div>

        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse39">Q: What happens if I???m not happy with a tradesperson???s work?</button>     
        <div id="collapse39" class="collapse" aria-labelledby="heading39" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    In the vast majority of cases, our homeowners have a positive experience using our service but we know that there may be occasions when things don???t work out
                </p>
            </div>
        </div>

        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse40">Q: How do I share a tradesperson I like with others?</button>     
        <div id="collapse40" class="collapse" aria-labelledby="heading40" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    If you are happy with any of the 24/7 TradesPeople tradespeople you have used, we encourage you to share their profile and reviews with others. There are standard social sharing buttons on each tradesperson???s profile page and you can always view the past tradespeople you have used by logging in to your account and browsing through your past jobs.
                </p>
            </div>
        </div>
    
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse41">Q: How do I log in to my account?</button>     
        <div id="collapse41" class="collapse" aria-labelledby="heading41" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    To log in to your account, visit the 24/7 TradesPeople home page at www.247tradespeople.com. Click ???Login??? in the upper-right navigation and enter your email and password in the homeowner section.
                </p>
            </div>
        </div>  
    
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse42">Q: How do I view jobs I???ve posted through 24/7 TradesPeople?</button>     
        <div id="collapse42" class="collapse" aria-labelledby="heading42" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    To view the jobs you???ve posted on our site, log in to your and click ???My jobs??? from the main navigation. Select a job from the list to view more details.
                </p>
            </div>
        </div>
    
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse43">Q: What if I have forgotten my password?</button>     
        <div id="collapse43" class="collapse" aria-labelledby="heading43" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    If you have forgotten your password or need to change it for any reason, you may change your password here.
                </p>
            </div>
        </div>
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse44">Q: How do I change my password?</button>     
        <div id="collapse44" class="collapse" aria-labelledby="heading44" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    If you have forgotten your password or need to change it for any reason, you may change your password here.
                </p>
                <p>
                    You may also change your password by logging in to your account, selecting ???My details??? from the navigation and clicking the ???Change password??? button.
                </p>
            </div>
        </div>
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse45">Q: How do I change/update my contact details?</button>     
        <div id="collapse45" class="collapse" aria-labelledby="heading45" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    To change your contact details, log in to your account, select ???My details??? from the navigation and click the ???Update contact details??? button.
                </p>
                <p>
                    To change your contact details using the Homes app, click ???More??? from the main navigation and then the ???Edit your contact info??? button.
                </p>
            </div>
        </div>
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse46">Q: How does 24/7 TradesPeople work?</button>     
        <div id="collapse46" class="collapse" aria-labelledby="heading46" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    <strong>Post your job for free: </strong> <br> Give us your job details and contact information using our main website.
                </p>
                <p>
                    <strong>Get up to 3 quotes:  </strong> <br> We send your job details to the relevant tradespeople in your area. Up to 3 interested tradespeople will pay to see your contact details and follow-up with you to quote.
                </p>
                <p>
                    <strong>Reviews:  </strong> <br> When each tradesperson expresses interest in your work, we will send you their profile and reviews to help you choose the right tradesperson for your job.
                </p>
                <p>
                    <strong>Review your tradesperson:  </strong> <br> When the work is complete, leave a review for your tradesperson on their quality of work, reliability and value for money.
                </p>
            </div>
        </div>
    
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse47">Q: I???ve always relied on word of mouth before, why should I use 24/7 TradesPeople?</button>     
        <div id="collapse47" class="collapse" aria-labelledby="heading47" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    Our service is better than word of mouth and directories for 5 reasons:
                </p>
                <p>
                    <strong>Work done when you need it: </strong> <br> Our tradespeople pay to quote on your job. So instead of waiting on tradespeople that may not be available, the tradespeople who contact you are genuinely interested in carrying out your job.
                </p>
                <p>
                    <strong>Quality workmanship:  </strong> <br> Our tradespeople know that in order to get reviewed well, they must perform well and do good work.
                </p>
                <p>
                    <strong>More certainty:  </strong> <br> Our tradespeople average 5 reviews each, which means that you don???t have to rely on only one recommendation.
                </p>
                <p>
                    <strong>More security:  </strong> <br> We check credentials before a tradesperson signs up to the service.
                </p>
                <p>
                    <strong>More choice:  </strong> <br> With over 20,000 tradespeople covering over 20 trades across the UK, we???re sure to have the right tradesperson for your job.
                </p>
            </div>
        </div> 
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse48">Q: How do you define the term ???local??? tradespeople?</button>     
        <div id="collapse48" class="collapse" aria-labelledby="heading48" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    The term ???local??? in London is different to ???local??? in rural Scotland. Every tradesperson sets their central post code and the distance they are willing to travel to work. Some tradespeople might specify that they only want to work within a 9 mile radius while others may specify a larger area to increase the chances of winning work.
                </p>
            </div>
        </div>
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse49">Q: How can you guarantee the quality of a tradesperson???s work?</button>     
        <div id="collapse49" class="collapse" aria-labelledby="heading49" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    The tradespeople on 24/7 TradesPeople operate as independent companies and are not working on behalf of 24/7 TradesPeople, so we cannot guarantee the quality of their work. The best way to ensure quality workmanship is to review the reviews left by previous customers on the tradesperson???s quality of work, reliability and value for money. 
                </p>
            </div>
        </div>
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse50">Q: Do you close tradespeople???s accounts?</button>     
        <div id="collapse50" class="collapse" aria-labelledby="heading50" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    24/7 TradesPeople is committed to minimising the risks posed to UK homeowners and the reputations of honest professionals by rogue traders.
                </p>
                <p>
                    For this reason, we will close accounts of tradespeople if:
                        <br>
                        They are not willing to resolve fair and reasonable negative feedback or complaints.
                        <br>
                        They receive negative reviews or serious complaints from a homeowner during their first few months with 24/7 TradesPeople.
                        <br>
                        They receive three instances of poor workmanship within the last 12 months (based on negative feedback or a complaint being raised).
                        <br>
                        After investigating an issue or complaint, we deem there is sufficient cause to remove a tradesperson from our service.
                        <br>
                        They behave inappropriately, including being racist or sexist, threatening, bullying, stealing from or abusing the trust of customers.
                        <br>
                        They receive serious complaints relating to their work or personal conduct from outside of the 24/7 TradesPeople site.
                        <br>
                        We receive feedback on them from Trading Standards, Government bodies or the Police.
                        <br>
                        They set up multiple 24/7 TradesPeople accounts for personal gain.
                        <br>
                        They can no longer pass identity validation.
                        <br>
                        They can no longer meet the financial stability criteria that we have set.
                </p>
                <p>
                    This list is by no means exhaustive and is there to protect both homeowners and honest tradespeople. For example, if a tradesperson???s business becomes financially challenged and they receive a complaint, we may choose to close their account.
                </p>
            </div>
        </div>  

        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse51">Q: What are Protected Payments?</button>     
        <div id="collapse51" class="collapse" aria-labelledby="heading51" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    We???ve partnered with Shieldpay to offer Protected Payments as our recommended way of paying for home improvement work.
                </p>
                <p>
                    If you choose to use it, Protected Payments gives you security and control when paying your tradesperson. Once you???ve agreed a price with your tradesperson, you pay that amount into Shieldpay???s secure ???vault???.
                </p>
                <p>
                    You can always see the money while the work is being carried out. Once the work???s complete and you???re happy, you confirm with Shieldpay and the money gets released to the tradesperson.
                </p>
                <p>
                    Shieldpay are authorised and regulated by the Financial Conduct Authority (FCA) ??? your money is held in a ring-fenced account and protected by Barclays Bank in the UK.
                </p>
            </div>
        </div>
    
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse52">Q: How does Shieldpay protect me?</button>     
        <div id="collapse52" class="collapse" aria-labelledby="heading52" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    Security and trust are at the heart of the Shieldpay service. They???re authorised and regulated by the Financial Conduct Authority (FCA) ??? your money is held in a ring-fenced account provided by Barclays Bank in the UK.
                </p>
                <p>
                    Firstly, Shieldpay verifies the identity of both homeowner and tradesperson. All you have to do is set up an account with Shieldpay. These checks don???t affect your credit review but are necessary to check who you say you are.
                </p>
                <p>
                    Secondly, any payment is then held securely in the Shieldpay ???vault???.
                </p>
                <p>
                    Thirdly, funds are only released when you both agree you???re happy that the work is complete, as you both agreed. This protects both parties.	
                </p>
                <p>
                    Plus, if anything doesn???t go to plan, Shieldpay are also on hand to handle any disputes.
                </p>
            </div>
        </div>
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse53">Q: How does Shieldpay verify customers on their website?</button>     
        <div id="collapse53" class="collapse" aria-labelledby="heading53" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    Similar to credit checks for other financial products, Shieldpay???s identity verification checks involve checking data with third party data providers and is approved by the Financial Conduct Authority (FCA).
                </p>
                <p>
                    Users that don???t pass Shieldpay???s checks are not allowed to use Shieldpay, so anyone using their website can have total confidence that you are dealing with a legitimate person or business.
                </p>
            </div>
        </div>
  
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse54">Q: Why do you charge a fee?</button>     
        <div id="collapse54" class="collapse" aria-labelledby="heading54" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    Shieldpay verifies the identity of all users so that you can pay with confidence.
                </p>
                <p>
                    They keep your money safe and secure in a ???vault??? until both parties are happy with the work completed by the tradesperson.
                </p>
                <p>
                    And, in case there is a dispute, they will be there to help you.
                </p>
            </div>
        </div>
        
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse55">Q: What payment methods are accepted for Protected Payments?</button>     
        <div id="collapse55" class="collapse" aria-labelledby="heading55" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    Shieldpay accepts the following payment methods to fund the vault:
                </p>
                <p>
                    Credit card (Visa / Mastercard / Amex).<br>
                    Debit card.<br>
                    Bank transfer.<br>
                    Pay by Bank app (https://paybybankapp.mastercard.co.uk/)<br>
                    For more info, head to Shieldpay Support or email them on support@shieldpay.com.
                </p>
            </div>
        </div>
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse56">Q: What if there is a dispute?</button>     
        <div id="collapse56" class="collapse" aria-labelledby="heading56" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    In the vast majority of cases, our homeowners have a positive experience using our service but we know that there may be occasions when things don???t work out. If this happens and you haven???t used Protected Payments for your work, check out our guidelines for dispute resolution for the steps you can take to resolve your dispute.
                </p>
                <p>
                    If you???ve chosen to use Protected Payments, you or the tradesperson can raise a dispute as long as the funds are still held in the Shieldpay vault.
                </p>
                <p>
                    If you???re unhappy with the tradesperson???s work and don???t want to release the money, in the first instance try and resolve the dispute directly with them. If you can???t resolve it this way, Shieldpay has a disputes process designed to help you come to a resolution. You can raise a dispute with Shieldpay through their platform directly by logging into your account.
                </p>
                <p>
                    Once a dispute has been raised, the money will remain locked in the ???vault??? until the dispute has been resolved and both parties instruct Shieldpay to release the funds.
                </p>
                <p>
                    A 14-day negotiation period will begin on the date a dispute is raised. To help you during that period and to act as an intermediary between the parties, Shieldpay has a dedicated legally trained dispute resolutions team on hand.
                </p>
                <p>
                    If no agreement can be reached during this 14-day negotiation period, then a further 14-day arbitration period will commence and either party (you or the tradesperson) may submit the matter to arbitration with Shieldpay???s specialist partner, Ajuve (https://ajuve.com/).
                </p>
                <p>
                    The result of this second 14-day period will be a legally binding decision that sets out what should happen to the funds related to the dispute within the ???vault???.
                </p>
                <p>
                    Further details of Shieldpay???s disputes process can also be found at the following address: https://www.shieldpay.com/europe/legal
                </p>
            </div>
        </div>

        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse57">Q: What if I have a dispute with a tradesperson about the completed work but have already agreed to release funds to them?</button>     
        <div id="collapse57" class="collapse" aria-labelledby="heading57" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    If there???s a dispute with the tradesperson, it???s important not to agree to release any funds in the vault before raising a dispute.
                </p>
                <p>
                    Once you???ve released the money, Shieldpay can???t take it back. If there???s a problem after you???ve paid, you???ll have to resolve it with the tradesperson or get independent professional advice.
                </p>
                <p>
                    Note: Shieldpay???s dispute resolution service is available if you???ve used Protected Payments. If you haven???t used Protected Payments for your job and you have a dispute with a tradesperson, please contact us for support.
                </p>
            </div>
        </div>
    
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse58">Q: How do I start a payment?</button>     
        <div id="collapse58" class="collapse" aria-labelledby="heading58" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    Once you???ve agreed a price with a tradesperson, the tradesperson will start the payment request to go through Protected Payments. You???ll then be contacted automatically by Shieldpay to fund the vault for the value the tradesperson requested (plus the 2% service charge).
                </p>
            </div>
        </div>
        
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse59">Q: Can I pay in multiple instalments?</button>     
        <div id="collapse59" class="collapse" aria-labelledby="heading59" data-parent="#accordionExample">
            <div class="card-body">
                <p>

                    Yes, you can. The tradesperson can raise multiple requests for payment against the same job. This means you can split payment into phases that you agree with the tradesperson.
                </p>
                <p>
                    For example, you have agreed a job with a tradesperson for ??2,000 in total. You can split this total amount into different phases as you wish. Maybe you fund the ???vault??? with an initial 10% deposit (??200), which you can agree with the tradesperson to release immediately to get the work started. This can be followed at an agreed later date with a second transaction amount for the balance (??1,800).
                </p>
            </div>
        </div>    
        
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse60">Q: How do I check a status of a transaction?</button>     
        <div id="collapse60" class="collapse" aria-labelledby="heading60" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    You can check the status of any transactions through your Shieldpay account. You can access your Shieldpay account through the following:
                </p>
                <p>
                    Shieldpay???s website: https://www.shieldpay.com/<br>
                    Shieldpay???s app:<br>
                    iOS: https://itunes.apple.com/gb/app/shieldpay/id1351811767?mt=8<br>
                    Android launches from June 2019<br>
                </p>
            </div>
        </div>    
        
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse61">Q: What happens once I agree to release of the funds?</button>     
        <div id="collapse61" class="collapse" aria-labelledby="heading61" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    Once you agree to release the funds from the ???vault???, you are confirming that you are satisfied with the work completed by the tradesperson.
                </p>
                <p>
                    It???s important to remember that you have control of the funds up to the point you agree to release the funds, so don???t agree to release them until you are satisfied with the work completed. In addition, Shieldpay can help with disputes with the tradesperson up to the point before you agree to release funds.
                </p>
            </div>
        </div>  
            
        <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse62">Q: What happens if the price of the job agreed with the tradesperson changes, but I have already funded the vault for the original amount?</button>     
        <div id="collapse62" class="collapse" aria-labelledby="heading62" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    In the event that you have funded the vault with the full amount for the originally agreed price and now the overall price has been reduced by agreement with the tradesperson (e.g. because of scope change etc.), then please contact Shieldpay at support@shieldpay.com to resolve this.
                </p>
                <p>
                    If you have agreed with the tradesperson to fund the work in multiple instalments to the vault, then we would recommend you adjust future payments to reflect the change in the overall job price.
                </p>
            </div>
        </div>  

    </div>
</div>

@endsection