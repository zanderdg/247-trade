{{-- * Template Name : Tradespeople-FAQs * --}}



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

    </section>

    <section class="faa-question">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="mm-pp">

                        <p>General Questions</p>

                        <h3>Frequently Asked Questions (Tradespeople)</h3>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <div class="bs-example privacy-page container">

        <div class="accordion" id="accordionExample">

           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse18">Q. What is job leads?</button>                

                    

                

            <div id="collapse18" class="collapse" aria-labelledby="heading18" data-parent="#accordionExample">

                <div class="card-body">

                    <p>

                        Job leads are the requests that homeowners post on our site. We sort these requests by postcode, trade and skill type and then pass the details along to our tradespeople.

                    </p>

                </div>

            </div>

            



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse19">Q. Where do I view and buy job leads?</button>                

                    

                <div id="collapse19" class="collapse" aria-labelledby="heading19" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            <strong> You can view and buy job leads in a variety of ways: </strong> <br>

                                o	On the main website: When you log in to your account you???ll automatically land on your job leads list. Here you can scroll through the leads available for you to buy. Click the ???View full details??? button to see more details or buy the lead.

                                <br>

                                o	On our mobile website: When you log in to your account using a smartphone you???ll automatically land on your ???Job Alerts??? screen and your job lead list. Scroll through the leads as you would on the main website and simply tap a lead for more details, or to buy it.

                                <br>

                                o	Via email alerts: If you have email alerts turned on, we email you every time a new lead is available for you to purchase. To buy the lead, click the ???Buy lead now??? button in the email.

                        </p>

                    </div>

                </div>

            



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse20">Q. How do I control which job leads I receive?</button>                

                   

                <div id="collapse20" class="collapse" aria-labelledby="heading20" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            The job leads you receive are determined by your postcode, work area and trade/skills you selected when you signed up. You can change these settings at any time by logging in to your account and selecting ???Edit job lead settings??? from your main ???Job Lead??? screen.

                        </p>

                        <p>	

                            <strong> Note: </strong> Your work area is circular by default. Drag the markers on your area map to refine your work area into any shape you would like.

                        </p>

                    </div>

                </div>

            



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse21">Q. Why are there no leads/very few leads in my job lead list?</button>                

                    

                <div id="collapse21" class="collapse" aria-labelledby="heading21" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Job leads are sent to you based on your postcode, work area and trade/skill settings. If these are not set correctly or your work area is set to be very small, there may not be many matching job leads for us to send you. To adjust your settings and expand your work area, log in to your account and click ???Edit job lead settings??? from your main job lead screen.

                        </p>

                    </div>

                </div>

            



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse22">Q. Can I remove job leads from my job lead list?</button>                

                    

                <div id="collapse22" class="collapse" aria-labelledby="heading22" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Yes. To remove a job lead you???re not interested in from your job lead list, click the ???remove??? icon in the upper right of the lead. The lead will no longer appear in your job lead list.

                        </p>

                        <p>

                            To remove a job lead on the mobile app, swipe to the left or right on the job lead and a delete button will appear.

                        </p>

                    </div>

                </div>

            </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse23">Q. How do I buy a job lead?</button>                

                    

                <div id="collapse23" class="collapse" aria-labelledby="heading23" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To buy a job lead on site, via email or with the mobile app, simply click the ???Buy??? button on the lead.

                        </p>

                        <p>

                            The lead price +VAT will be charged to the credit card you have on your account or deducted from your existing account balance, if any. You will then receive the full customer contact details for the lead.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse24">Q. What happens after I buy a job lead?</button>                

                    

                <div id="collapse24" class="collapse" aria-labelledby="heading24" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            When you buy a job lead, we will give you the customer???s mobile number and email address so you may contact them directly to find out more about the job and quote. We also send your profile page, reviews and contact details to the customer.

                        </p>

                        <p>

                            A lead may be bought by up to three tradespeople, so contact the customer as soon as possible to introduce yourself and increase your chances of winning the work.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse25">Q. Why do I need a certificate to buy a job lead?</button>                

                    

                <div id="collapse25" class="collapse" aria-labelledby="heading25" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Gas jobs, such as boiler servicing, require tradespeople to have Gas Safe certification to carry out the work. To ensure the quality of our tradespeople, only tradespeople who have verified their Gas Safe certification may buy these types of job leads.

                        </p>

                        <p>

                            To add or update your Gas Safe certificate, select ???Edit job lead settings??? and then ???Certifications???.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse26">Q. Do customers know that I paid for their job lead?</button>                

                    

                <div id="collapse26" class="collapse" aria-labelledby="heading26" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Yes. When customers post a job, we notify them that our tradespeople pay to quote on their work. We also send them reminder notifications and request that they remove their job if they no longer require a quote.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse27">Q. How do you maintain the quality of job leads?</button>                

                    

                <div id="collapse27" class="collapse" aria-labelledby="heading27" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            It is not possible to guarantee that all customers who post jobs on 24/7 Tradespeople have a high level of intent to carry out the work and are not just doing so out of curiosity. To counter this, we are constantly updating our forms to help give you as much information on each job as possible.

                        </p>

                        <p>

                            We also encourage customers to visit our Ask an Expert section to try to find the answers they need from expert tradespeople before they request a quote on our site. Additionally, if a job lead is not purchased within 24 hours of posting, we ask the customer to update their job with more information.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse28">Q. What is the ???Still looking??? label on a job lead?</button>                

                    

                <div id="collapse28" class="collapse" aria-labelledby="heading28" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            When you???re looking at your leads list, you might see leads that say ???Still looking???. This means that the homeowner doesn???t have a quote yet but is still looking ??? or ??? it means they have a quote but want more.

                        </p>

                        <p>

                            <strong> At certain points after they???ve posted their job, we ask homeowners what???s happening with it. We do this for 2 reasons: </strong> <br>

                                If they???re still looking for someone, or want more quotes, we???ll push the lead back to the top of your leads list. If you see ???Still looking??? on any lead, it means they???re actively looking for someone, which means you???re more likely to win work.

                                <br>

                                If they???ve found someone already, we can remind them to withdraw the job so you???re not paying for something that???s not available.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse29">Q. How do I view the job leads I have bought?</button>                

                    

                <div id="collapse29" class="collapse" aria-labelledby="heading29" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To view all the job leads you have bought, log in to your account or launch the mobile app and select ???Purchased Jobs??? from the main navigation. Here you will see a list of jobs you are currently quoting on or have quoted on.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse30">Q. What are archived jobs?</button>                

                    

                <div id="collapse30" class="collapse" aria-labelledby="heading30" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            The archive is where you can place any job leads you have purchased and wish to separate from your purchased jobs list (e.g. jobs already won and completed). Jobs are not automatically archived. Only jobs you sort into the archive will we be placed there.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse31">Q. How do I archive a job?</button>                

                    

                <div id="collapse31" class="collapse" aria-labelledby="heading31" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To archive a job lead you have purchased, find the job in your Purchased Jobs list and select the ???Archive job??? button from the status column.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse32">Q. How do I view an archived job?</button>                

                    

                <div id="collapse32" class="collapse" aria-labelledby="heading32" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To view all the job leads that you have archived, log in to your account and select ???Purchased Jobs??? from the main navigation. Click the ???Archive??? tab to view and access your list of archived jobs.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse33">Q. How do I contact the customer?</button>                

                    

                <div id="collapse33" class="collapse" aria-labelledby="heading33" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            <strong> When you buy a job lead, there are three ways to get in touch: </strong>

                        </p>

                        <p>

                            <strong> Chat </strong> ??? this is available through the Trades app, or when you???re logged in to the website. It works in a similar way to Whatsapp, where you can message the homeowner who posted the job. It???s an easy and familiar way to get in touch with homeowners.

                        </p>

                        <p>

                            <strong> Phone </strong> ??? if they don???t pick up then always leave a quick voicemail, or send a text message, to introduce yourself.

                        </p>

                        <p>

                            <strong> Email </strong> ??? you???ll receive their email address too if you???d prefer to get in touch using that. Get in touch with the customer as soon as possible to introduce yourself and increase the chances of winning the work.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse34">Q. What if I can???t contact the customer?</button>                

                    

                <div id="collapse34" class="collapse" aria-labelledby="heading22" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If a customer isn???t returning your calls, replying to emails, or responding to chat messages, you should use our ???request a callback??? feature. This sends an email and text message to the customer on your behalf, asking them to contact you directly.

                        </p>

                        <p>

                            To request a callback, log in to your 24/7TradesPeople account and click ???Purchased Jobs??? from the main navigation. Select the job lead from your list of purchased jobs and then select ???Request a callback???.

                        </p>

                        <p>

                            Bear in mind that while we take every effort to ensure that leads posted to the site are genuine, we can???t guarantee a potential customer???s behaviour after posting a job.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse35">Q. I???ve tried contacting the customer, but the details are invalid. What do I do?</button>                

                    

                <div id="collapse35" class="collapse" aria-labelledby="heading35" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            You can now send a chat message to customers by using the Trades app, or by logging in to your account on the website. This is linked directly to the account the homeowner has set up with us, so should be more effective if their contact details aren???t right.

                        </p>

                        <p>

                            That said, we take many efforts to ensure the quality of our job leads, and that contact details are valid, but on rare occasions there are sometimes issues. If the contact details we have given you result in an email bounce-back message, a disconnected phone line or belong to an individual that didn???t post the job, please let us know by contacting us here and we???ll look into it for you.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse36">Q. How do I request a callback?</button>                

                    

                <div id="collapse36" class="collapse" aria-labelledby="heading36" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To request a callback, log in to your 24/7 TradesPeople account and click ???Purchased Jobs??? from the main navigation. Select the job lead from your list of purchased jobs and then click ???Request a call back???. We will then send an email and SMS to the customer on your behalf requesting that they contact you directly.

                        </p>

                        <p>

                            You may also request a callback via our mobile website or app by following the same steps on your mobile smartphone.

                        </p>

                        <p>

                            Please note that while we take every effort to ensure that leads posted to the site are genuine, we cannot guarantee a potential customer???s behaviour after posting a job.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse37">Q. What happens after I request a callback?</button>                

                    

                <div id="collapse37" class="collapse" aria-labelledby="heading37" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            When you request a callback for a job lead, we will send an email and text message to the customer on your behalf requesting that they contact you directly and reminding them that you have paid to quote on their work. This often helps in establishing contact with the customer as many times they were simply not prepared or expecting your call.

                        </p>

                        <p>

                            Please note that while we take every effort to ensure that leads posted to the site are genuine, we cannot guarantee a potential customer???s behaviour after posting a job.

                        </p>

                    </div>

                </div> 



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse38">Q. What if the customer doesn???t let me quote?</button>                

                    

                <div id="collapse38" class="collapse" aria-labelledby="heading38" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            24/7 TradesPeople is an introductory service that aims to connect quality tradespeople with potential customers. We can???t guarantee how a customer will behave after posting a job or if they???ll accept your attempt to contact them, and offer you a fair opportunity to quote. We have found that this allows us to charge you considerably less than if we operated a purely commission-based fee.

                        </p>

                        <p>

                            For this reason, we encourage you not to rely on an individual lead for the success of your next job. Our tradespeople report that, on average, they win 1 in every 3 leads they purchase and make 30 times their money back in trade value. Therefore, you should always evaluate your success rate over several leads and not each individual one.

                        </p>

                        <p>

                            It???s also important to remember that any time you are able to make contact with a new customer and discuss your services, you have made a valuable connection that may turn into future work, even if the current job does not proceed.

                        </p>

                        <p>

                            It???s possible to request a credit if the customer didn???t allow you to provide a quote (excludes pay-as-you-go members).

                            <br>

                            Find out more about this policy

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse39">Q. Why should I request a review?</button>                

                    

                <div id="collapse39" class="collapse" aria-labelledby="heading39" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Reviews serve as your word-of-mouth online and help you build your reputation. Every time you purchase a job lead, we send your profile and reviews to the customer. The more positive reviews you have, the easier it will be to win more work.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse40">Q. How do I request a review?</button>                

                    

                <div id="collapse40" class="collapse" aria-labelledby="heading40" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To request a review, log in to your account or launch the mobile app, find the job on your Purchased Jobs list and select ???Request review??? from the status column. We also recommend that you leave your calling card and ask the customer directly to rate you when you???ve completed the job.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse41">Q. Where do my reviews go?</button>                

                    

                <div id="collapse41" class="collapse" aria-labelledby="heading41" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            All of your reviews are stored on your 24/7 TradesPeople profile page under the ???Reviews??? tab. Your 3 most recent reviews are also displayed on the home page. A link to these reviews, as well as your overall reviews score is sent to the customer every time you buy a job lead.

                        </p>

                    </div>

                </div>  



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse42">Q. Where can I view my reviews?</button>                

                    

                <div id="collapse42" class="collapse" aria-labelledby="heading42" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To see an overview of the reviews you have received, log in and select ???Account??? and then ???Reviews??? or launch the Find Work mobile app and select ???Reviews??? from the main navigation. You will then be shown a summary of your average reviews for Quality, Reliability and Value.

                        </p>

                        <p>

                            You will also see jobs split into those which have been reviewed and those you???re waiting to be reviewed on. From here, you may respond to a review by selecting the job and then ???Reply to review???.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse43">Q. What if I receive a negative or unfair review?</button>                

                    

                <div id="collapse43" class="collapse" aria-labelledby="heading43" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If you receive a review that is not as good as you expected, we suggest that you leave a reply to the review or contact the customer directly to address their concerns. Most disputes can be resolved easily and customers can update their review at any time. If this fails, or the review is particularly unfair, factually incorrect or slanderous, please contact us to investigate.

                        </p>

                        <p>

                            Note: Any response you leave to a review will be visible to future customers on your profile page, so remember to keep your comments professional.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse44">Q. How do I respond to a review?</button>                

                    

                <div id="collapse44" class="collapse" aria-labelledby="heading44" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            When a customer leaves a review, we???ll send you an email with their review and comment. To reply to the review, select the link in the email to leave a comment.

                        </p>

                        <p>

                            You may also log in to your account, select ???Account??? and then ???Reviews??? and then select review where you would like to leave a response. To respond to a review using the mobile app, select ???Reviews??? from the main navigation, select the review and then leave a comment.

                        </p>

                        <p>

                            Note: Any response you leave to a review will be visible to future customers on your profile page, so remember to keep your comments professional.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse45">Q. Can I delete reviews?</button>                

                    

                <div id="collapse45" class="collapse" aria-labelledby="heading45" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            No. However, if you receive a review that is particularly unfair, factually incorrect or slanderous that you have been unable to resolve directly with the customer, we will investigate on your behalf. Please contact us to report the review. The review will be flagged as under investigation until the investigation has finished.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse46">Q. I???m new to 24/7 TradesPeople and I don???t have any reviews. How do I win work?</button>                

                    

                <div id="collapse46" class="collapse" aria-labelledby="heading46" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            We know it can be difficult when you first join, so we give you credit to spend on winning your first work. The best way to win work without reviews is to:<br>

                                Update your profile with your qualifications, specialities and photos of past work.

                                <br>

                                Start with low-cost, easy-to-service leads where homeowners are less likely to rely on reviews.

                                <br>

                                Contact the customer immediately when you buy a job lead.

                                <br>

                                Give a thorough, detailed quote and provide references.

                                <br>

                                Always ask for reviews once the job is done.

                        </p>

                        <p>

                            Once you???ve built-up a few reviews, it???ll be easier to go after bigger jobs and keep winning.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse47">Q. How does a customer know that my reviews are genuine?</button>                

                    

                <div id="collapse47" class="collapse" aria-labelledby="heading47" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Unlike other recommendation sites, we operate a closed reviews system. Only customers who have hired a tradesperson via 24/7 TradesPeople can submit a review of that tradesperson. Customers can update or change their review at any time and tradespeople can comment/respond.

                        </p>

                        <p>

                            We screen reviews and comments for offensive language and conduct random spot checks on both positive and negative reviews. We have also put in place automated checks to catch tradespeople who try to rate themselves.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse48">Q. What is my profile page?</button>                

                    

                <div id="collapse48" class="collapse" aria-labelledby="heading48" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            A unique profile page for you/your company is included with your membership. This page showcases your reviews as well as any company information, certifications and photos of your work that you provide.

                        </p>

                        <p>

                            Your profile page is sent to the customer every time you buy a job lead and we also ensure that it appears near the top of the list when someone searches for your company name on sites like Google. We???ve found that tradespeople with a full profile are 3 times more likely to win work.

                        </p>

                        <p>

                            Also, if you already have your own website, we recommend that you add a link to your profile page so your other potential customers can see the reviews you???ve earned.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse49">Q. How do I update/change my profile page?</button>                

                    

                <div id="collapse49" class="collapse" aria-labelledby="heading49" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To update or change your profile page, log in to your account and click the ???Web profile??? tab. From there you can update any element of your profile page including your company description, profile picture and cover image. If you haven???t already selected your main trade, you???ll be prompted to do this when you log in.

                        </p>

                        <p>

                            Selecting your trade is important as it makes your profile page more visible in Google search, where homeowners looking for a tradesperson can find you. You???ll also need to set your trade and update your company description, profile picture and cover image in order to qualify for requesting a credit for a job lead.

                        </p>

                        <p>

                            What you can update:<br>

                                cover image

                                <br>

                                profile picture

                                <br>

                                company description

                                <br>

                                primary trade

                                <br>

                                photo gallery

                                <br>

                                trades & services

                                <br>

                                work area

                                <br>

                                Part P, Gas Safe, TrustMark and SafeContractor certificates / accreditations.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse50">Q. How do I upload photos of my past work?</button>                

                    

                <div id="collapse50" class="collapse" aria-labelledby="heading50" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To upload photos of your work, log in to your account and select ???Account??? and then ???My photos???. Then click the ???Choose file??? button to select the photos stored on your computer. The photos you upload will displayed on your profile page.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse51">Q. How do I view my profile page?</button>                

                    

                <div id="collapse51" class="collapse" aria-labelledby="heading51" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To view your profile page, log in to your account and select ???Account??? and then ???My website???. The link to your profile page is displayed at the top of this screen. Click the link to view your profile page as it appears to the public.

                        </p>

                        <p>

                            To view your profile page using the mobile app, just select ???My Website??? from the main navigation and you will see the mobile version of your profile page.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse52">Q. How do I log in to my account?</button>                

                    

                <div id="collapse52" class="collapse" aria-labelledby="heading52" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To log in to your account, visit the 24/7 TradesPeople home page at www.247tradespeople.com. Click ???Login???in the upper-right navigation and enter your email and password in the tradesperson section.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse53">Q. What if I have forgotten my password?</button>                

                    

                <div id="collapse53" class="collapse" aria-labelledby="heading53" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If you have forgotten your password or need to change it for any reason, you may change your password here.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse54">Q. How do I change my password?</button>                

                    

                <div id="collapse54" class="collapse" aria-labelledby="heading54" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If you have forgotten your password or need to change it for any reason, you may change your password here. You may also change your password by logging in to your account and visiting ???Account > Account details??? and clicking the ???Change password??? button.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse55">Q. How do I change/update my contact details?</button>                

                    

                <div id="collapse55" class="collapse" aria-labelledby="heading55" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To change your contact details, log in to your account and select ???Account??? and ???Account details???. From there you can edit your contact info or change your address.

                        </p>

                        <p>

                            To change your contact details using the mobile app, select ???Contact details??? from the main navigation.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse56">Q. How do I change/update my alert contact preferences?</button>                

                    

                <div id="collapse56" class="collapse" aria-labelledby="heading56" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Turn notifications on or off for our apps.

                        </p>

                        <p>

                            Apple/iOS: Go to Settings > Notifications > Trades app.

                        </p>

                        <p>

                            Android: Go to Settings > Notifications > Trades app.

                        </p>

                        <p>

                            For email: change or update your job lead alerts by logging in to your account. Select ???My Account??? and ???Contact Preferences??? from the navigation. Here you???ll see if your email alerts are turned on or off. Click ???EDIT??? to switch either of these on or off. You may also change your contact email and phone number from this page.

                        </p>

                        <p>

                            To change the type of leads that are sent to you, click ???Public Profile??? from the main navigation and edit the services and work area that you cover.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse57">Q. How do I change/update my trade, skills or work area?</button>                

                    

                <div id="collapse57" class="collapse" aria-labelledby="heading57" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Your default postcode, work area and trade/skills were selected during sign-up. You can change these settings at any time by logging in to your account and selecting ???Edit job lead settings??? from your main ???Job Lead??? screen.

                        </p>

                        <p>

                            Note: Your work area is circular by default. Drag the markers on your area map to refine your work area into any shape you would like.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse58">Q. How do I change/update my payment details?</button>                

                    

                <div id="collapse58" class="collapse" aria-labelledby="heading58" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If you???ve paid your membership or purchased a lead using a credit or debit card, the card details have been stored securely for future purchases. To change the card used, log in online and head to the ???Membership & Invoices??? section under ???My account???. You???ll notice an ???Update card??? link within the ???Billing details??? section. Click this link and follow the on-screen instructions to update your card.

                        </p>

                        <p>

                            Note: You may also be prompted to change your card during your next lead purchase. If you???re shown a prompt, simply click the ???Pay with a different card??? link and follow the instructions.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse59">Q. How do I change/update my company details?</button>                

                    

                <div id="collapse59" class="collapse" aria-labelledby="heading59" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To change your company details, log in to your account, select ???Account>Account details??? and click the ???Edit personal details??? button.

                        </p>

                        <p>

                            Note: We cannot change the company details on invoices that have already been issued. If your company details change within the fiscal year, the new details will appear on the next scheduled invoice.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse60">Q. How do I add/update my Gas Safe and Part P certifications?</button>                

                    

                <div id="collapse60" class="collapse" aria-labelledby="heading60" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To add or update your Gas Safe and Part P certifications, log in to your account and select ???Edit job lead settings??? from your main ???Job Leads??? screen. Click the ???Certifications??? tab and then the ???Add certificate??? button to enter your certificate details.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse61">Q. How do I disable email lead alerts?</button>                

                    

                <div id="collapse61" class="collapse" aria-labelledby="heading61" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To disable email job lead alerts that you no longer wish to receive, log in to your account and select ???Edit job lead settings??? from your main ???Job Leads??? screen. Click the ???Alert contact preferences??? tab and set your Email alert status to ???Off???.

                        </p>

                        <p>

                            To disable alerts using the mobile app, select ???Notifications??? from the main navigation and switch the alerts on or off.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse62">Q. How do I cancel my account?</button>                

                    

                <div id="collapse62" class="collapse" aria-labelledby="heading62" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If you wish to cancel your account, please get in touch with the team  and select ???Cancellations??? as the contact query category.

                        </p>

                        <p>

                            Note: cancellation of your account will remove your profile and all of your reviews and you???ll no longer have access to job leads. You can cancel at any time but if you???re still in contract, you???ll need to pay the remainder of your yearly contract.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse63">Q. When do I get billed?</button>                

                    

                <div id="collapse63" class="collapse" aria-labelledby="heading63" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Payment is taken at two times: when your membership fee is due and any time you purchase a job lead. Your membership fee will be taken either monthly, quarterly or annually from the date of activation depending on the membership tariff you have selected.

                        </p>

                        <p>

                            To view when your next membership payment will be taken, log in to your account, select ???Account??? and ???Billing???. Your membership plan and next renewal date are displayed under the ???Membership??? tab.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse64">Q. When and how often do I receive an invoice?</button>                

                    

                <div id="collapse64" class="collapse" aria-labelledby="heading64" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Invoices are issued monthly from the date you joined 24/7 TradesPeople or activated your current membership plan. They will list all job lead purchases, membership payments and credits received during that month.

                        </p>

                        <p>

                            For example: if you joined on the 5th of January, you will receive an invoice the 5th day of every month regardless of your membership plan or amount of leads purchased.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse65">Q. Can I change when invoices are issued?</button>                

                    

                <div id="collapse65" class="collapse" aria-labelledby="heading65" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Unfortunately, no. Invoices are issued monthly from the date you joined 24/7 TradesPeople or activated your current membership plan and this cannot be adjusted at this time.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse66">Q. How do I view/find my 24/7 TradesPeople invoices?</button>                

                    

                <div id="collapse66" class="collapse" aria-labelledby="heading66" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Your invoice is emailed to you in the form of an electronic PDF attachment each month with the subject line ???Invoice from 24/7 TradesPeople???. You will need a copy of Adobe PDF reader installed to open this file.

                        </p>

                        <p>

                            To view your invoices online, log in to your account and select ???Account??? and ???Billing???. Your invoices are listed under the ???Invoices??? tab. Click the Invoice ID number to download, save and view your electronic invoice.

                        </p>

                        <p>

                            Note: 24/7 TradesPeople do not issue paper copies of invoices.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse67">Q. How do I pay my invoice or settle an outstanding balance?</button>                

                    

                <div id="collapse67" class="collapse" aria-labelledby="heading67" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            An invoice is not a bill for money owed to 24/7 TradesPeople.

                        </p>

                        <p>

                            Job lead purchases and SMS alert top-ups are charged to the card on your account immediately at the time of purchase. Similarly, your membership fee is taken automatically at the time of renewal. Therefore, your invoice serves as a receipt of purchases made during the past month.

                        </p>

                        <p>

                            If collection of payment fails for any reason, a notification will appear across the top of the screen when you log in to your account online. To pay this balance, click the ???pay the invoice??? link in the notification.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse68">Q. Can I pay an outstanding balance using my account balance?</button>                

                    

                <div id="collapse68" class="collapse" aria-labelledby="heading68" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            No. Your 24/7 TradesPeople account balance has no fiscal value and can only be used for purchasing job leads.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse69">Q. Why is there a difference between the total invoice and the sum of payments received?</button>                

                    

                <div id="collapse69" class="collapse" aria-labelledby="heading69" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            The only reason for a difference between the value of the invoice and the sum of payments received is if the membership payment has failed. To pay this invoice and settle the difference, log in to your account and click the ???pay the invoice??? link in the notification at the top of your screen.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse70">Q. What do the negative values on my invoice mean?</button>                

                    

                <div id="collapse70" class="collapse" aria-labelledby="heading70" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If a line or value on your invoice is negative, this refers to a credit given to your account balance. This includes refunds and any credits for when you have reported a lead where you couldn???t provide a quote.

                        </p>

                        <p>

                            Negative values also appear when your account balance or credit is used to buy a job lead.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse71">71. Why does my invoice show a credit?</button>                

                    

                <div id="collapse71" class="collapse" aria-labelledby="heading71" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Your invoice will show a negative value (credit) any time you use your account balance to pay for a job lead. It will also show a credit when you have been issued a refund or credit note for any reason.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse72">Q. What does ???free balance??? mean?</button>                

                    

                <div id="collapse72" class="collapse" aria-labelledby="heading72" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            ???Free balance??? refers to any credit included with your membership and is only valid during the current membership period. ???Free balance??? appears on your invoice when your free balance is used to buy a job lead.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse73">Q. What does ???credit redeemed??? mean?</button>                

                    

                <div id="collapse73" class="collapse" aria-labelledby="heading73" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            ???Credit redeemed??? refers to any credit that has been added to your account as a goodwill gesture. ???Credit redeemed??? appears on your invoice when this credit is used to buy a job lead.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse74">Q. How do I see if a lead was purchased using my account balance?</button>                

                    

                <div id="collapse74" class="collapse" aria-labelledby="heading74" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Job leads purchased using your account balance will be listed as either ???Free balance??? or ???Credit redeemed??? on your invoice. The amount will be listed with a negative value to show that your account credit was used and payment was not taken from your card.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse75">Q. Why is the value on my bank statement different than the value of the lead I purchased?</button>                

                    

                <div id="collapse75" class="collapse" aria-labelledby="heading75" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            When you buy a job lead, payment is taken from your available 24/7 TradesPeople account balance before your card is charged. If there is not enough credit on your account to pay the full price of the lead +VAT, the remainder will be charged to your card.

                        </p>

                        <p>

                            To view the value and date of the payment charged to your card, view the ???Payment Amount??? section of your monthly invoice.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse76">Q. Why do I still receive an invoice if I have not made any purchases?</button>                

                    

                <div id="collapse76" class="collapse" aria-labelledby="heading76" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            For the consistency of your records, we generate an invoice for every month of your membership. If you haven???t made any purchases during the month and receive a blank invoice, it???s just so that you can keep it for your records.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse77">Q. What do I do if I have been overcharged?</button>                

                    

                <div id="collapse77" class="collapse" aria-labelledby="heading77" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If you think you???ve been overcharged for any reason or want to query a payment, please contact us here.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse78">Q. Why have I been charged?</button>                

                    

                <div id="collapse78" class="collapse" aria-labelledby="heading78" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            There is a charge for your membership plan, for job lead purchases and SMS alerts.

                        </p>

                        <p>

                            If you have an account balance that covers the full price of a lead +VAT, then you won???t be charged for buying a lead. If you don???t have an existing account balance or don???t have enough balance to cover the full price of the lead, we???ll take payment from the card registered on your account.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse79">Q. Why do you need to take a payment to add a new card?</button>                

                    

                <div id="collapse79" class="collapse" aria-labelledby="heading79" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Our payment provider requires us to charge a small amount to validate the card before we can store it securely. We???ve kept that amount as low as possible (??1) and refund the payment immediately.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse80">Q. Can I add more than one card to my account?</button>                

                    

                <div id="collapse80" class="collapse" aria-labelledby="heading80" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            At the moment, we can only have one card on file for each account but we hope to offer the option of adding multiple cards going forwards.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse81">Q. The billing details listed don???t match the card you???re taking money from. What can I do?</button>                

                    

                <div id="collapse81" class="collapse" aria-labelledby="heading81" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Please click the ???Update card??? link within the ???Billing details??? section and follow the instructions to update your card details. Re-entering the information should fix this.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse82">Q. How much does 24/7 TradesPeople cost?</button>                

                    

                <div id="collapse82" class="collapse" aria-labelledby="heading82" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            We can tailor your membership to what suits you best. It???s an annual contract, with a flexible monthly cost to match how many leads you???re looking for. For that, you get all this:<br>

                                Access to job leads on our site and our app, which you buy individually. The price of a lead varies, with an average of ??3.50 +VAT, and is based on the job???s size, scope, location and demand for the skills required.

                                <br>

                                A profile page which helps you appear higher in Google searches, and shows all your skills and reviews in one place.

                        </p>

                        <p>

                            Enquire now and we???ll talk you through the options.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse83">Q. What is included with membership?</button>                

                    

                <div id="collapse83" class="collapse" aria-labelledby="heading83" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Your membership includes access to over 75,000 job leads a month on our site and via email, as well as hosting and maintenance of your profile page and full access to our mobile app. Monthly membership includes member benefits, while our annual plan includes member benefits premium.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse84">Q. How do you justify the cost of 24/7 TradesPeople?</button>                

                    

                <div id="collapse84" class="collapse" aria-labelledby="heading84" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Once you???ve become a member, you pay for every job lead you wish to quote on. Lead prices are determined by the job???s size, scope, location and demand for the skills required to carry it out.

                        </p>

                        <p>

                            Once you???ve become a member, you pay for every job lead you wish to quote on. Lead prices are determined by the job???s size, scope, location and demand for the skills required to carry it out.

                        </p>

                        <p>

                            Also, when you win a job you may well get a customer for life, which means that for a relatively small introductory fee you can secure a good deal of future work. Many jobs also lead to other projects if the customer is satisfied with the work.

                        </p>

                        <p>

                            To check your own return from 24/7 TradesPeople, try our return calculator here.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse85">Q. How do you calculate the price of job leads?</button>                

                    

                <div id="collapse85" class="collapse" aria-labelledby="heading85" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            The price of a lead varies with an average of ??3.50+VAT and is based on the job???s size, scope, location and demand for the skills required to carry it out.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse86">Q. Why do job lead prices vary?</button>                

                    

                <div id="collapse86" class="collapse" aria-labelledby="heading86" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Lead prices are determined by the job???s size, scope, location and demand for the skills required to carry it out. We do this because some job leads are easier and cheaper for us to obtain and supply to you than others.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse87">Q. Does my account credit balance roll over?</button>                

                    

                <div id="collapse87" class="collapse" aria-labelledby="heading87" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            There are two types of credits that make up your account balance. Any credit that???s included with your membership plan is valid for the membership period only and does not roll over. The second type is any credit you receive in your account as a goodwill gesture, for example ??? when you couldn???t quote for a job lead you bought. These credits never expire.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse88">Q. Why should I pay for a lead when I don???t win?</button>                

                    

                <div id="collapse88" class="collapse" aria-labelledby="heading88" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            We provide an introductory service that aims to connect quality tradespeople with potential customers. It???s not possible for us to guarantee how a customer will behave after posting a job or if you will be chosen to carry out their work for every lead you buy. We have found that this allows us to charge you considerably less than if we operated a purely commission-based fee.                

                        </p>

                        <p>

                            For this reason, we encourage you not to rely on an individual lead for the success of your next job. Our tradespeople report that, on average, they win 1 in every 3 leads they purchase and make 30 times their money back in trade value. Therefore, you should always evaluate your success rate over several leads and not each individual one.

                        </p>

                        <p>

                            It???s also important to remember that any time you are able to make contact with a new customer and discuss your services, you have made a valuable connection that may turn into future work, even if the current job does not proceed.

                        </p>

                        <p>

                            To check your own return from 24/7 TradesPeople, try our return calculator here.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse89">Q. What is your return policy?</button>                

                    

                <div id="collapse89" class="collapse" aria-labelledby="heading89" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            As per our terms and conditions, we do not offer a ???return policy??? on individual lead purchases. This is because we cannot guarantee nor adequately enforce that each potential customer you contact will accept your quote or select you to carry out their job.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse90">Q. How does 24/7 TradesPeople work?</button>                

                    

                <div id="collapse90" class="collapse" aria-labelledby="heading90" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Get job leads: We send you job leads based on your postcode, work area, trade and skills. You can view these leads on our Trades app, website, or through email alerts.

                            <br>

                            Buy job leads: Each job lead includes the customer???s job description, estimated budget and postcode as well as the price to buy the full customer contact details. Browse the leads and buy those most likely to convert into work.

                            <br>

                            Get in touch with the customer: Once you???ve bought the job lead, you???ll be able to exchange messages using our chat feature ??? just use the app or log in to our website to get started. It???s an easy way to kick off a conversation. We???ll also give you the customer???s mobile number and email address so you can contact them directly to find out more about the job and quote. Meanwhile, your profile page, reviews and contact details are sent to the customer.

                            <br>s

                            Get reviewed: After the work is complete, ask your customer to rate you based on quality, reliability and value. Reviews act as word of mouth online and will help you build your reputation and win more work.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse91">Q. I???ve always relied on word of mouth before, why should I use 24/7 TradesPeople?</button>                

                    

                <div id="collapse91" class="collapse" aria-labelledby="heading91" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Our service is better than word of mouth and directories for 5 reasons:

                        </p>

                        <p>

                            No waiting for the phone to ring: we provide a continuous supply of job leads to choose from all year round matching your specified trade, skills and location

                            <br>

                            Grow your reputation: your reviews and profile serve as your online word of mouth and help you win new customers

                            <br>

                            Fill gaps in your diary: during periods when you???re less busy, use 24/7 TradesPeople to win work and widen your customer base

                            <br>

                            Showcase your work: use your personal profile to share your company information, qualifications and photos of past work with potential customers

                            <br>

                            Find work on the go: use our mobile app and SMS alerts to buy and manage job leads when you???re out and about



                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse92">Q. How do you define the term ???local tradespeople????</button>                

                    

                <div id="collapse92" class="collapse" aria-labelledby="heading92" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            The term ???local??? in London is different to ???local??? in rural Scotland. Every tradesperson sets their central post code and the distance they are willing to travel to work. Some tradespeople might specify that they only want to work within a 9 mile radius while others may specify a larger area to increase the chances of winning work.

                        </p>

                        <p>

                            This means that tradespeople who prefer to find jobs closer to home can do so and save both time and petrol by targeting customers local to them.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse93">Q. Why have you asked me to send documents?</button>                

                    

                <div id="collapse93" class="collapse" aria-labelledby="heading93" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            We want you to be joining a place where great tradespeople go to find new customers. The checks we make will establish your identity in the same way banks and insurance companies do. It???s the last step to becoming one of the gang!

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse94">Q. What do I need to sign up?</button>                

                    

                <div id="collapse94" class="collapse" aria-labelledby="heading94" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To sign up with 24/7 TradesPeople, you must provide us with the following:

                        </p>

                        <p>

                            <strong> Business information </strong> <br>

                                Name of your business

                                <br>

                                Your business address (where your business operates from)

                        </p>

                        <p>

                            <strong> Personal information </strong> <br>

                                Your first name and last Name

                                <br>

                                Your date of birth

                                <br>

                                Your personal address (If you run your business from home, we???ll only need one address.)

                                <br>

                                Note that both your business and personal address cannot be located at a PO Box or virtual address.

                        </p>

                        <p>

                            <strong> Business attributes </strong> <br>

                                Your contact details (phone number and email address)

                                <br>

                                Your primary trade, type of business and number of employees (including yourself)

                        </p>

                        <p>

                            <strong> Payment details </strong> <br>

                                Details of your valid UK debit or credit card (to load into our system and allow you to buy job leads and pay membership which secures reduced lead prices and other benefits)

                        </p>       

                        <p>

                            Each time you buy a job lead, we???ll pass your business information to the homeowner so that they can carry out further checks on you and your business before they hire you.

                        </p>  	

                        <p>

                            We at 24/7 TradesPeople must be confident that you are who you say you are as we are making an introduction between homeowners and tradespeople. For this reason you must be able to prove your business and personal details at all times whilst being a member of 24/7 TradesPeople. If at any time we are uncertain of your identity, even if you have been with us for several years, your account will be suspended and you will be asked to provide documents to prove your business and personal details. Once you have provided the required documents and they have been verified, your account will be reactivated.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse95">Q. Why is the value on my bank statement different than the value of the lead I purchased?</button>                

                    

                <div id="collapse95" class="collapse" aria-labelledby="heading95" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            24/7 TradesPeople is committed to minimising the risks posed to UK homeowners and the reputations of honest professionals by rogue traders.

                        </p>

                        <p>

                            <strong> For this reason, we will close accounts of tradespeople if: </strong> <br>

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

                            This list is by no means exhaustive and is there to protect both homeowners and honest tradespeople. For example, if your business becomes financially challenged and you get a complaint, we may choose to close your account.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse96">Q. Can I keep track of jobs and customers not on 24/7 TradesPeople?</button>                

                    

                <div id="collapse96" class="collapse" aria-labelledby="heading96" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Yes. If you download the app, you can add other customers and jobs so you can store all of your customer information in one place. Also, when you add your other customers and jobs you will be able to easily create and issue invoices to them using the app.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse97">Q. How do I add a customer to the app?</button>                

                    

                <div id="collapse97" class="collapse" aria-labelledby="heading97" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To add other customers and jobs that you did not find through 24/7 TradesPeople, launch the app and select ???Add a Job??? from the navigation panel and enter the job and customer details. You may also add a job directly to your jobs list by selecting the ???+??? button at the upper right of your job list screen. This will allow you to send invoices to the customer and keep all of your customer contact details in one place.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse98">Q. How do I find my customers using the app?</button>                

                    

                <div id="collapse98" class="collapse" aria-labelledby="heading98" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To find a customer that you would like to contact, request a review from or send an invoice, launch the app and select ???Jobs??? from the navigation panel. All of your jobs will be displayed, starting from the most recent. Select a job to view the customer details and scroll down to load older jobs.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse99">Q. How do I create an invoice?</button>                

                    

                <div id="collapse99" class="collapse" aria-labelledby="heading99" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To create an invoice, launch the app and select ???Create an Invoice??? from the navigation panel and then select the job you wish to issue an invoice for. Enter your bank details if you have not already and then fill in the invoice details.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse100">Q. Why do I need to provide my bank details?</button>                

                    

                <div id="collapse100" class="collapse" aria-labelledby="heading100" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            With the app, you can issue invoices and offer your customers a choice of payment methods: cash, cheque or bank transfer. If you offer the choice to pay by bank transfer, we???ll include your bank account number and sort code on the invoice.	

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse101">Q. How do I send an invoice to a customer?</button>                

                    

                <div id="collapse101" class="collapse" aria-labelledby="heading101" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To issue an invoice directly to your customer using the mobile app, simply select ???Email??? after you have filled-out the invoice details.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse102">Q. How do I preview an invoice before sending it?</button>                

                    

                <div id="collapse102" class="collapse" aria-labelledby="heading102" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To preview an invoice created using the app before sending it to your customer, click ???Preview invoice??? after creating the invoice.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse103">Q. How do I delete an invoice I have created?</button>                

                    

                <div id="collapse103" class="collapse" aria-labelledby="heading103" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If you need to delete an invoice you created or issued using the app, select ???Invoices??? from the navigation panel. Select the invoice you wish to delete and click ???Delete???.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse104">Q. How do I find an invoice I have sent?</button>                

                    

                <div id="collapse104" class="collapse" aria-labelledby="heading104" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            To find an invoice you have sent using the app, select ???Invoices??? from the navigation panel. Your invoices will be listed with the most recent at the top. You may also find an invoice for a particular job by selecting ???Jobs??? from the navigation panel and then clicking the job.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse105">Q. A homeowner???s asked me to go through mediation, what does this mean for me?</button>                

                    

                <div id="collapse105" class="collapse" aria-labelledby="heading105" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            In the vast majority of cases, tradespeople and homeowners have a positive experience using our service. Still, we know that there may be times when things don???t work out as planned. If this happens, a homeowner can ask you to go through mediation to try and come to an agreement. We explain what this means for you here.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse106">Q. What if a homeowner owes me money and won???t pay?</button>                

                    

                <div id="collapse106" class="collapse" aria-labelledby="heading106" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            If you???re owed money for work you???ve already carried out, we have advice about what to do here.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse107">Q. What is protected payments?</button>                

                    

                <div id="collapse107" class="collapse" aria-labelledby="heading107" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            We???ve teamed up with Shieldpay to offer protected payments.

                        </p>

                        <p>

                            Shieldpay are authorised and regulated by the Financial Conduct Authority (FCA) ??? your money is held in a ring-fenced account and protected by Barclays Bank in the UK.

                        </p>

                        <p>

                            Protected payments is a safe and secure way to get paid for the work you do. As a tradesperson, it???s important to know that the money is there to be paid for the work.	

                        </p>

                        <p>

                            The homeowner loads the money for the job into Shieldpay???s secure ???vault???. The funds are released when both you and the homeowner are satisfied with the work. After this, funds are released quickly via bank transfer or to a nominated debit or credit card.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse108">Q. How does Shieldpay protect me?</button>                

                    

                <div id="collapse108" class="collapse" aria-labelledby="heading108" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Security and trust are at the heart of the Shieldpay service ??? they???re authorised and regulated by the Financial Conduct Authority (FCA). Your money is held in a ring-fenced account provided by Barclays Bank in the UK.

                        </p>

                        <p>

                            Shieldpay verify the identity of both homeowner and tradesperson when you set up your account. These checks don???t affect your credit review but are necessary to check who you say you are.

                        </p>

                        <p>

                            Secondly, any payment is then held securely in the Shieldpay ???vault???.

                        <p>

                            Thirdly, funds are only released when you both agree you???re happy that the work is complete, as you both agreed. This protects both parties.

                        </p>

                        <p>

                            Plus, if anything doesn???t go to plan, Shieldpay are also on hand to handle any disputes.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse109">Q. How does Shieldpay verify people?</button>                

                    

                <div id="collapse109" class="collapse" aria-labelledby="heading109" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Similar to credit checks for other financial products, Shieldpay???s identity verification involves checking data with third party data providers and is approved by the Financial Conduct Authority (FCA).

                        </p>

                        <p>

                            Users that don???t pass Shieldpay???s checks are not permitted to transact using Shieldpay, so anyone using their platform can have total confidence that you are dealing with a legitimate person or business.

                        </p>

                        <p>

                            These checks don???t affect your credit review but are necessary to check who you say you are.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse110">Q. What happens if I don???t pass Shieldpay???s checks?</button>                

                    

                <div id="collapse110" class="collapse" aria-labelledby="heading110" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Shieldpay perform checks with 3rd party agencies such as credit agencies (these searches won???t affect your credit review). In a small number of cases, some people don???t pass these checks. If this happens, you won???t be able to use protected payments with Shieldpay.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse111">Q. I haven???t had confirmation that I can use the protected payments service with Shieldpay</button>                

                    

                <div id="collapse111" class="collapse" aria-labelledby="heading111" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Signing-up to use protected payments with Shieldpay can be up to a three-step process. The first two steps are necessary for everyone signing up: <br>



                            1.Sign-up page: enter personal details (e.g. mobile number, name, DoB, address).

                            <br>

                            2.3rd party checks: these are performed by Shieldpay with approved 3rd parties.

                            <br>

                            3.Further identification required: Shieldpay may ask for further information and/or documentation to verify you as a sole trader or your limited company.



                        </p>

                        <p>

                            Once you???ve completed all the steps, Shieldpay will check the info and confirm that you???re ready to use protected payments with homeowners. This takes up to 24 hours.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse112">Q. Do I pay a fee for protected payments?</button>                

                    

                <div id="collapse112" class="collapse" aria-labelledby="heading112" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Shieldpay is free for tradespeople to use through 24/7 TradesPeople.

                        </p>

                        <p>

                            The homeowner pays a small fee of 2% of the total cost of the work for Shieldpay???s service and peace of mind.

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse113">Q. How do I start a transaction?</button>                

                    

                <div id="collapse113" class="collapse" aria-labelledby="heading113" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Once you???ve agreed a price with a homeowner, you???ll start the payment request for funding the job with protected payments. This can be done via the following methods:

                        </p>

                        <p>

                            Through the 24/7 TradesPeople TP app and TP web views: there will be a ???Get paid with Shieldpay??? button in: <br>

                                ??? The purchased leads view for all job leads bought.

                                <br>

                                ??? The detailed purchased leads view for each job lead bought.

                        </p>

                        <p>

                            You???ll be asked to enter the amount and a brief description relating to the funds you???re requesting from the homeowner. Once you submit this form, you???ll be re-directed to your Shieldpay account to finish it.

                        </p>

                        <p>

                            Then the homeowner will be contacted automatically by Shieldpay to fund the vault for the value you???ve requested from them (plus the 2% service charge).

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse114">Q. How do I check the status of a transaction?</button>                

                    

                <div id="collapse114" class="collapse" aria-labelledby="heading114" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            You can check the status of any transactions through your Shieldpay account. You can access your Shieldpay account via the following:

                        </p>

                        <p>

                            Shieldpay???s website: https://www.shieldpay.com/ Shieldpay???s app:

                                <br>

                                ??? iOS: https://itunes.apple.com/gb/app/shieldpay/id1351811767?mt=8

                                <br>

                                ??? Android launches from June 2019

                        </p>

                    </div>

                </div>



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse115">Q. What if there is a dispute?</button>                

                    

                <div id="collapse115" class="collapse" aria-labelledby="heading115" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Either you or the homeowner can raise a dispute as long as the funds are still held in the Shieldpay ???vault???.

                        </p>

                        <p>

                            If the homeowner is unhappy with your work and won???t agree to releasing the funds in the vault, in the first instance try and resolve the dispute directly with them. If you can???t resolve it this way, Shieldpay has a disputes process designed to help you come to an agreement. You can raise a dispute with Shieldpay through their platform directly by logging into your account.

                        </p>

                        <p>

                            Once a dispute has been raised, the money will remain locked in the ???vault??? until the dispute has been resolved and both parties instruct Shieldpay to release the funds.

                        </p>

                        <p>

                            A 14-day negotiation period will begin on the date a dispute is raised. To help you during that period and to act as an intermediary between the parties, Shieldpay has a dedicated legally trained dispute resolutions team.

                        </p>

                        <p>

                            If no agreement can be reached during this 14-day negotiation period, then a further 14-day arbitration period will start, and either you or the homeowner may submit the matter to arbitration with Shieldpay???s specialist partner, Ajuve (https://ajuve.com/).

                        </p>

                        <p>

                            The result of this second 14-day period will be a legally binding decision that sets out what should happen to the funds related to the dispute within the ???vault???.

                        </p>

                        <p>

                            You can find out more about Shieldpay???s disputes process here: <Strong> https://www.shieldpay.com/europe/legal </Strong>

                        </p>

                    </div>

                </div>



            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse117">Q. How do I withdraw my money?</button>                

                    

                <div id="collapse117" class="collapse" aria-labelledby="heading117" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            When you???re ready to withdraw the funds, Shieldpay will ask you for your bank account or payment card details.

                        </p>

                        <p>

                            You can keep the funds in the Shieldpay vault for as long as you want.

                        </p>

                        <p>

                            Shieldpay doesn???t charge for holding your money for you nor do you pay interest on that money when held in the vault.

                        </p>

                        <p>

                            Once you???ve withdrawn your funds, they???ll arrive in your nominated bank account, usually within one business day.

                        </p>

                    </div>

                </div>   



           

            <button type="button" class="cus-btn-color btn-link collapsed row" data-toggle="collapse" data-target="#collapse116">Q. What happens if the money is in the vault, the work is complete to a high standard, and the homeowner tries to withhold or withdraw the money?</button>                

                    

                <div id="collapse116" class="collapse" aria-labelledby="heading116" data-parent="#accordionExample">

                    <div class="card-body">

                        <p>

                            Try and resolve the dispute directly with the homeowner in the first instance. If you cannot resolve it this way, Shieldpay has a disputes process designed to help you come to a resolution. You can raise a dispute with Shieldpay by logging into your account on their website.

                        </p>

                    </div>

                </div>

        </div>

    </div>



@endsection