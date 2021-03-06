{{-- * Template Name : Homeowner-UA * --}}

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

    <div class="container my-5">

        <h1>Homeowner User Agreement</h1>
        <p>
            Thank you for accessing our Service at <a href="{{ url('/') }}">www.247tradespeople.com</a> (the “Website“) or through the 24/7 TradesPeople ‘Find a Tradesman’ application on your mobile device. Please read this Agreement carefully as it governs your use of the Service. Do not use the Service unless you wish to be bound by this Agreement because, by clicking ‘Post job’ and/or continuing to use any part of the Service, you confirm your acceptance of this Agreement (which also includes the Privacy Policy). By clicking ‘Post job’, you are requesting us to provide the Service as soon as reasonably practicable.
            Please note that if you wish to access or use the Service as a Trade Business then you must read and accept the “Trade Business User Agreement” which is accessible here.
            The Service is for use in the United Kingdom only. You must not access the Service from any other jurisdiction. You are responsible for all compliance with laws and regulations which apply to you.
            <br>
            This Agreement was last modified on 6 November 2020.
        </p>
        <ul>
            <li>01.	<a href="#Definitions">Definitions</a></li>
            <li>02.	<a href="#ServiceContent">Service Content</a></li>
            <li>03.	<a href="#UseoftheService">Use of the Service</a></li>
            <li>04.	<a href="#Behaviour">Behaviour</a></li>
            <li>05.	<a href="#Fees">Fees</a></li>
            <li>06.	<a href="#CancellationandTermination">Cancellation and Termination</a></li>
            <li>07.	<a href="#LinksandUserContent">Links and User Content</a></li>
            <li>08.	<a href="#UseofInformation">Use of Information</a></li>
            <li>09.	<a href="#ArrangementswithTradeBusinesses">Arrangements with Trade Businesses</a></li>
            <li>10.	<a href="#IntellectualPropertyRights">Intellectual Property Rights</a></li>
            <li>11.	<a href="#Indemnity">Indemnity</a></li>
            <li>12.	<a href="#LimitationofLiability">Limitation of Liability</a></li>
            <li>13.	<a href="#OurRights">Our Rights</a></li>
            <li>14.	<a href="#General">General</a></li>
            <li>15.	<a href="#Chat">Chat</a></li>
        </ul>

        <h2 id="Definitions">Definitions</h2>
        <p>We are 24/7 TRADESPEOPLE LTD . Our registered company number is 12851474 and our registered office is at Kemp House 160 City Road London EC1V 2NX. Where we refer to ourselves in this Agreement, this is also taken to include (where the context allows) our group companies, affiliates, and our and/or their employees, associated and contracted persons, and persons supplying services to us or them. You can contact us via our online contact form.
        Where we refer to you in this Agreement, this also includes any person that accesses or uses our Service on your behalf. The “Agreement” includes the terms set out here and the Privacy Policy as made available via the internet and/or our “Apps” from time to time.
        Our “Apps” are the 24/7 TradesPeople ‘Find a Tradesman’ application and any other application that we release (each as modified and/or updated by us from time to time).
        The “Service” consists of the Website, our Apps, any pages we operate on third party social media applications, and the content and services we make available through them via the internet, mobile devices including smart phones and tablets, and/or interactive television devices and services, together with the provision by us of associated information, products and services by e-mail, telephone, fax or mail.
        Any person using the Service to promote their services (except us) shall be a “Trade Business“. As part of receiving the Service, you may from time to time upload information to the Service or otherwise provide us or other users of the Service with information relating to you or your subcontractors (including by communicating via the Communities) (“Homeowner Information“).
        </p>

        <h2 id="ServiceContent">Service Content</h2>
        <p>
            The vast majority of the material on the Service originates from our users, and we rely on Homeowners to accurately describe their requirements for any projects for which they invite tenders from Trade Businesses through the Service (“Projects“). We have little or no editorial control over the material and we therefore cannot guarantee the accuracy, timeliness, completeness, performance or fitness for any particular purpose of the material available through the Service. We cannot accept responsibility for errors, omissions, or inaccurate material available through the Service, and make no warranty that the Service will be uninterrupted or error free, or that any defects will be corrected.
            Whilst we take steps to prevent misuse of our systems, we cannot warrant that the Service will be free of viruses or other malicious code and accept no liability for loss or damage caused from the transmission of such code. We recommend that you always use up-to-date firewalls and anti-virus software to protect your equipment and data.
            The reviews and other information about Trade Businesses found on the Service are provided by users, not by us. We do not endorse or recommend any particular Trade Business. Any material you obtain from the Service is used at your own risk, and we will not be liable for any loss or damage arising out of or in connection with access or use of the Service (except to the extent that such liability cannot be excluded by law).
        </p>

        <h2 id="UseoftheService">Use of the Service</h2>
        <p>You are responsible for ensuring that you are legally entitled to publish any information which you upload. You may only use the Service to invite tenders for genuine Projects where you have authority to appoint one or more Trade Business and your intention is to do so subject to agreeing appropriate terms. You may not invite tenders for any Project which is not legal.
        It is your responsibility to select a suitable Trade Business and to negotiate the terms of any Project to be performed by the Trade Business selected. We do not guarantee any specific Trade Business’s information, accreditation, or registration. We make no warranty regarding any goods or services purchased or obtained through listing a Project on the Service or any transactions entered into through the Service, and you should in all cases make your own enquiries. In particular, it is your responsibility to carry out appropriate checks (including, where relevant, DBS checks) on any Trade Business that you are considering engaging and to request evidence of relevant trade or industry accreditations, and to satisfy yourself that the Trade Business is solvent and has appropriately qualified and certified personnel to complete the Project prior to contracting. You should not engage any Trade Business or make any deposit or other payment to them without having conducted such checks to your full satisfaction. While our hope is that you will be happy with every Trade Business you find through the Service, you should not engage any Trade Business if you have any doubts or concerns about it.
        We will not be a party to any contract made between you and any Trade Business and therefore we shall not be liable for any loss or damage that results from any dealings between you and any Trade Business including but not limited to any direct, indirect or consequential or inconsequential loss of any kind.
        You agree not to use the Service in any unlawful manner and in particular shall not:
        </p>
        <ul>
            <li>•	Post any material that infringes any patent, trademark, copyright, trade secret or other proprietary right of any person;</li>
            <li>•	Post any corrupted files, files that contain viruses, or any other code that may damage the operation of a computer or other electronic device;</li>
            <li>•	conduct or forward surveys, contests other than in Communities (as defined below) intended for such uses, and shall not forward pyramid schemes or chain letters;</li>
            <li>•	download any file Posted by another user of a forum that the user knows, or reasonably should know, cannot be legally distributed in such manner;</li>
            <li>•	impersonate another person or entity, or falsify or delete any author attributions, legal or other proper notices or proprietary designations or labels of the original or source of software or other material contained in a file that is Posted;</li>
            <li>•	cause the Service to be interrupted, damaged, rendered less efficient or such that the effectiveness or functionality of the Service is in any way impaired; or</li>
            <li>•	restrict or inhibit any other user from using and enjoying the Service.</li>
        </ul>

        <p>You agree that you will comply with the Privacy Policy.</p>

        <h2 id="Behaviour">Behaviour</h2>
        <p>You agree not to use the Service in any unlawful manner and in particular shall not:</p>
        <ul>
            <li>•	defame, abuse, harass, stalk, threaten or otherwise violate the legal rights (including rights of privacy and publicity) of others;</li>
            <li>•	publish, post, upload, distribute or disseminate (“Post”) any inappropriate, defamatory, abusive, infringing, obscene, discriminatory or otherwise unlawful material.</li>
        </ul>
        
        <h2 id="Fees">Fees</h2>
        <p>Use of the Service is generally free of charge, but we may charge a fee for use of specific Service features that offer enhanced functionality or additional user benefits, including, for example, our Featured Posting service. Our Featured Posting service offers you the opportunity to have your Project listing made more prominent, and in some circumstances, Trade Businesses may prioritise such Projects. Featured Postings appear on the Service for three (3) business days.
        Where we charge a fee for using a specific Service feature, this will be made clear to you through the Service and you will not be charged unless you specifically request that feature, for example by clicking on the relevant ‘Pay Now’ button.
        Our fees are quoted in Pounds Sterling, and we may change them from time to time, either temporarily – for example, in connection with certain promotions or the launch or marketing of new services, or for an extended period or permanently until our next fees review. We will notify you of such changes to our fees by posting such changes through the Service. Such changes will not affect any existing payment obligation to us, but they will be effective for any new or further use of the relevant service from the date on which we post the revised fees on the Service.
        You are responsible for paying all applicable fees when they are due. If you fail to pay the relevant fees, without prejudice to any other right or remedy we may be entitled to under this Agreement or by law, we may limit your ability to use the applicable services. If your payment method fails or your account is past due, we may collect fees owed using other collection mechanisms.
        When you invite Trade Businesses to tender for a Project through the Service, we cannot and do not guarantee that you will receive any responses or that, if you do, any Trade Business that does respond will be suitable or able to undertake that Project. This is the case whether you use the Service functionality for posting Projects that we make available free of charge or our Featured Product service or, unless we explicitly confirm otherwise in writing, any other paid-for aspect of the Service. You are therefore not entitled to any refund if you do not receive any responses, or if you consider that any responses you have received are not suitable for your purposes.
        You acknowledge and agree that if you breach any of the provisions set out in the section entitled ‘Use of the Service’ above, we may suspend or terminate your access to any paid-for features, and/or remove any content you have Posted, including content included in Featured Postings or otherwise relating to Projects.
        </p>

        <h2 id="CancellationandTermination">Cancellation and Termination</h2>
        <p>UNDER THE CONSUMER CONTRACTS (INFORMATION, CANCELLATION AND ADDITIONAL CHARGES) REGULATIONS 2013 YOU HAVE A RIGHT TO CANCEL CERTAIN CONTRACTS FOR SERVICES WITHIN FOURTEEN (14) WORKING DAYS OF THE DAY AFTER THE DAY ON WHICH SUCH CONTRACTS ARE CONCLUDED. ADDITIONALLY, THE CONSUMER PROTECTION (DISTANCE SELLING) REGULATIONS 2000 PROVIDE FOR A RIGHT TO CANCEL CERTAIN OTHER CONTRACTS, ALTHOUGH THIS RIGHT EXISTS FOR A SHORTER PERIOD. HOWEVER, IN BOTH CASES, THESE RIGHTS NO LONGER APPLY WHERE, AT YOUR EXPRESS REQUEST, THE SERVICE PROVIDER BEGINS TO PROVIDE THE REQUESTED SERVICE(S) BEFORE THE EXPIRY OF THE RELEVANT NOTICE PERIOD.
        IF YOU USE OUR FEATURED POSTING SERVICE (OR THE SERVICE FUNCTIONALITY WE MAKE AVAILABLE FOR POSTING PROJECTS FREE OF CHARGE), THIS CONSTITUTES AN EXPRESS ORDER BY YOU TO US TO POST THE INFORMATION YOU PROVIDE TO US ABOUT YOUR PROJECT ON THE SERVICE, AND INVITE TRADE BUSINESSES TO TENDER FOR IT, WHEN YOU SUBMIT YOUR POSTING. SINCE WE PROVIDE THIS SERVICE ON RECEIPT OF YOUR INSTRUCTIONS TO DO SO, YOU ACKNOWLEDGE AND AGREE THAT ALTHOUGH YOU MAY CANCEL OR WITHDRAW A PROJECT LISTING IF YOU NO LONGER WISH TO RECEIVE RESPONSES TO IT FROM TRADE BUSINESSES, YOU WILL NOT BE ENTITLED TO ANY REFUND IN RESPECT OF ANY PAYMENT YOU MAY HAVE MADE IN RESPECT OF THAT LISTING (FOR EXAMPLE, THROUGH OUR FEATURED PRODUCT SERVICE).
        Subject to the above, you may cancel a Project listing that you have posted at any time through ‘My jobs’ on the main navigation. Click the job you wish to cancel and then click the ‘Cancel job’ button. If you wish to completely close your account and terminate this Agreement, you may do so by contacting our Customer Service Team (see our Contact page for details of how to get in touch with us). This process will not affect any arrangements you have already entered into with a Trade Business.
        </p>

        <h2 id="LinksandUserContent">Links and User Content</h2>
        <p>
        It is not possible for us to review all websites which are linked to from the Service (or link to the Service), and you should therefore take care when following any link. We cannot accept liability for any loss or damage that may be suffered as a result of following any links. You agree not to Post links to any websites.
        The Service contains discussion forums, bulletin board services, chat areas, communities and/or other message or communication facilities (collectively “Communities”). Although our hope is that all users will use the Service responsibly, and we require all users to ensure that all content that they post on the Service is lawful, we are not responsible for reviewing or policing user content and so it is possible that Communities may carry offensive, harmful, inaccurate or otherwise inappropriate material, or in some cases, postings that have been mislabelled or are otherwise deceptive. We urge you to exercise proper judgement and to use caution and common sense when using Communities. We do not control the information delivered to the Communities, and have no obligation to monitor the Communities.
        You are responsible for your own communications and for any consequences arising out of them. The Communities are intended to allow users to send and receive messages and material that are legal, proper and related to the particular Community, and you agree that you shall use them only for this purpose.
        We do not guarantee the truthfulness, accuracy, or reliability of any communications Posted in the Communities or endorse any opinions expressed in the Communities. You should take all due care in relying on material Posted in the Communities, as this is done at your own risk.
        It is important for you to note that all Communities are public, and that others may read communications made via the Community without the author’s knowledge. Always use caution when giving out any personally identifying information about yourself in any Community, and do not give personally identifying information about any other person unless entitled to do so.
        </p>

        <h2 id="UseofInformation">Use of Information</h2>
        <p>
        You are solely responsible for the content, accuracy, and completeness of the Homeowner Information, and agree only to provide true, accurate, current and complete information.
        You acknowledge that we may edit, modify or remove any parts of Homeowner Information which we consider is in breach of any of the provisions of this Agreement, and/or suspend or terminate your access to the Service without notice.
        By providing Homeowner Information you grant to us a royalty-free, perpetual, irrevocable, non-exclusive license to use, copy, reproduce, modify, publish, edit, translate, distribute, perform, and display the material alone or as part of other works in any form, media, or technology whether now known or hereafter developed, and to sub-license such rights through multiple tiers of sub-licensees. The foregoing grants shall include the right to exploit any proprietary rights in such materials, including but not limited to rights under copyright, trademark, service mark or patent laws under any relevant jurisdiction. You also waive any moral rights you have in the materials. Do not Post any materials on the Service that you would not want us to use in this way.
        You consent to information about the device you use to access the Service being collected and processed for fraud prevention purposes and we may use third parties (and information they provide) to help us prevent fraud or unauthorised access to our Service.
        You agree not to copy, reproduce, modify, create derivative works from, distribute or publicly display any content (except for your Homeowner Information) from the Service without our prior written permission.
        </p>

        <h2 id="ArrangementswithTradeBusinesses">Arrangements with Trade Businesses</h2>
        <p>
            Should you have a dispute with a Trade Business, you must address such dispute directly to the Trade Business concerned. However, you agree to notify the details of the dispute to us as soon as reasonably practicable.
            We may decide to investigate any grievances held by you or by Trade Businesses and may discuss any such investigation with all involved parties. We may take any lawful action we deem necessary in the event of a grievance, but likely outcomes of a grievance investigation include:
        </p>
        <ul>
            <li>•	you and the Trade Business being allowed to continue using the Service;</li>
            <li>•	your and/or the Trade Business’ access to the Service being suspended for a period of time;</li>
            <li>•	your and/or the Trade Business’ access to the Service being terminated and banned for a definite or indefinite period.</li>
        </ul>
        <p>Save as provided above, we cannot be involved in your dealings with Trade Businesses and, in the event that you have a dispute with one or more Trade Businesses, you hereby release us from any and all claims, demands and damages of every kind and nature, known and unknown, suspected and unsuspected, disclosed and undisclosed, arising out of or in any way connected with such disputes.</p>

        <h2>Intellectual Property Rights</h2>
        <p>You acknowledge that all present and future copyright and other intellectual property rights subsisting in, or used in connection with, the Service and any part of it (the “Rights“), including the manner in which the Service is presented or appears and all information and documentation relating to it is our property (or that of our licensors), and nothing in this Agreement shall be taken to transfer any of the Rights to you.
        Solely for the purposes of receiving the Service, we hereby grant to you for the period during which the Service is provided a non-exclusive, non-transferable licence to use the Rights.
        </p>

        <h2 id="Indemnity">Indemnity</h2>
        <p>It is your responsibility to ensure that you are entitled to provide the Homeowner Information and you therefore agree to indemnify us against any and all expenses, damages and losses of any kind (including reasonable legal fees and costs) incurred by us in connection with any actual or threatened claims of any kind (including without limitation any claim of trademark or copyright infringement, defamation, breach of confidentiality, false or misleading advertising or sales practices) arising from your provision of Homeowner Information.
        We shall indemnify you against any and all expenses, damages and losses of any kind (including reasonable legal fees and costs) incurred by you in connection with any actual or threatened claims of any kind (including without limitation any claim of trademark or copyright infringement, defamation, breach of confidentiality, false or misleading advertising or sales practices) that any material on the Service generated and uploaded by us infringes the intellectual property of any third party.
        </p>

        <h2 id="LimitationofLiability">Limitation of Liability</h2>
        <p>Notwithstanding any other provision, nothing in this Agreement shall exclude or limit either party’s liability for death or personal injury caused by that party’s negligence, fraud or fraudulent misrepresentation, or any other liability that cannot lawfully be excluded or limited.
        The sole warranty that we make is that we promise to provide any features of the Service that you pay for with reasonable skill and care.
        If you are dissatisfied with the Service, or the terms of this Agreement, your sole remedy under this Agreement shall be to discontinue use of the Service.
        Without limiting the foregoing, we shall have no liability for any failure or delay resulting from any matter beyond our reasonable control.
        Other than as set out above, we shall not be liable in contract, tort, negligence, statutory duty, misrepresentation, or otherwise for any loss or damage whatsoever arising from or in any way connected with this Agreement.
        Save as expressly set out herein, all conditions, warranties and obligations which may be implied or incorporated into this Agreement by statute, common law, or otherwise and any liabilities arising from them are hereby expressly excluded to the extent permitted by law.
        We shall not be liable for any loss of business, loss of profits, business interruption, loss of business information, loss of data, or any other pecuniary loss (even where we have been advised of the possibility of such loss or damage).
        In the event that any limitation or exclusion of liability in this Agreement proves ineffective, then we shall not be liable to you for more than £100 in aggregate. If you register as both a “Homeowner” and as a “Trade Business” then only the aggregate cap in the Trade Business User Agreement shall apply.
        We cannot guarantee the day or time that we will respond to any email, telephone or written enquiries or Website form submissions.
        Each of the provisions of this Clause shall be construed separately and independently of the others.
        </p>

        <h2 id="OurRights">Our Rights</h2>
        <p>
        We reserve the right at all times to edit, refuse to post, or to remove from the Service any information or materials which we consider breaches or is likely to breach this Agreement, or which is or may be otherwise illegal or objectionable, and to disclose any information we deem appropriate to satisfy any applicable law, regulation, legal process, police request or governmental request.
        Without prejudice to the generality of the above, we reserve the right to terminate the provision to you of the Service or restrict your access to the Service at any time and/or to terminate this Agreement immediately on notice in the event that you are in material breach of this Agreement.
        If you have made a payment for our Featured Posting service, or for any other paid-for service that we may offer from time to time, and we have not completed delivery of that service, then subject to the provisions of the two paragraphs immediately above, we shall only be entitled to suspend or terminate provision of the Service to you, or terminate this Agreement on prior written notice:
        </p>
        <ul>
            <li>•	such notice to become effective only when we have completed delivery of the service that you have paid for or, if the following period is longer</li>
            <li>•	on three (3) days’ prior written notice.</li>
        </ul>
        <p>In all other circumstances, we reserve our rights to: modify or discontinue temporarily or permanently all or part of the Service; terminate the provision to you of the Service or restrict your access to the Service; and/or terminate this Agreement at any time without notice for any reason whatsoever, without liability of any kind to you (provided always that any such termination shall be without prejudice to the rights and liabilities of each party accrued prior to such termination).
        We may vary the terms of this Agreement from time to time and shall post the revised terms on the Website. If you do not agree to the revisions made by us to the terms of this Agreement then you have the right to stop using Service, and should do so immediately. All revisions that we make to the terms of this Agreement shall become effective on the date four business days after the date on which the revised terms in question are posted on the Website. Your continued use of the Service after that date will constitute acceptance of the amended Agreement.
        </p>

        <h2 id="General">General</h2>
        <p>Clause headings are inserted for convenience only and shall not affect the interpretation of this Agreement.
        If any provisions hereof are held to be illegal or unenforceable such provisions shall be severed and the remainder of this Agreement shall remain in full force and effect unless the business purpose of this Agreement is substantially frustrated, in which case it shall terminate without giving rise to further liability.
        You may not assign, transfer or sub-contract any of your rights hereunder without our prior written consent. We may assign, transfer or sub-contract all or any of our rights at any time without consent.
        No waiver shall be effective unless in writing, and no waiver shall constitute a continuing waiver so as to prevent us from acting upon any continuing or subsequent breach or default.
        This Agreement constitutes the entire agreement as to its subject matter and supersedes and extinguishes all previous communications, representations (other than fraudulent misrepresentations) and arrangements, whether written or oral with the exception of the Terms of Use and/or the Trade Business User Agreement where these have been entered into. To the extent that there is any conflict between them, those agreements shall apply in the following order of precedence:
        </p>
        <ul>
            <li>•	this Homeowner User Agreement;</li>
            <li>•	the Trade Business User Agreement; then</li>
            <li>•	the Terms of Use.</li>
        </ul>
        <p>
        You acknowledge that you have placed no reliance on any representation made but not set out expressly in this Agreement.
        Any notice to be given under this Agreement may be given via e-mail, regular mail, or by hand to the address provided on the Website or otherwise as notified by one party to the other.
        Nothing herein shall create or be deemed to create any joint venture, principal-agent or partnership relationship between the parties and neither party shall hold itself out in its advertising or otherwise in any manner which would indicate or imply any such relationship with the other.
        Notwithstanding any other provision in this Agreement a person who is not a party hereto has no right under the Contracts (Rights of Third Parties) Act 1999 to rely upon or enforce the terms of this Agreement.
        This Agreement shall be subject to the laws of England and the parties shall submit to the exclusive jurisdiction of the English courts.
        In the event of any comments or questions regarding this Agreement (including the Privacy Policy) then please Contact Us.
        </p>

        <h2 id="Chat">Chat</h2>
        <p>
        Our chat feature enables you, the homeowner, to talk and share content, with tradespeople on our site. This includes, but is not limited to, sharing text, images and video. To protect any personal information that is shared via chat, at no point should content be copied, shared, re-posted or repurposed to any other platform or site.
        We take no responsibility for any of the content posted using our chat feature, either by yourself or anyone you are in conversation with via the chat feature. We do not monitor the messages sent via chat but do retain the right to use or edit anything posted in a chat message or remove any content that breaks this User Agreement. We also reserve the right to pass any, or all, content deemed inappropriate, or that which relates to a criminal investigation, to the relevant authorities.
        Any additional work that is agreed with a tradesperson via chat, which falls outside the scope of the original job posted to the 24/7 TradesPeople platform and without a related follow up job being created, will fall outside of the 24/7 Tradespeople
        service and no further contractual agreements will be made involving 24/7 TradesPeople.
        Should you, or anyone, post content we deem inappropriate or that contravenes this User Agreement, we reserve the right to permanently remove you, or that user, from our service.
        If you need to report abuse or the posting of offensive, inappropriate or illegal content via chat, please contact us with details and our team will investigate.
        </p>

    </div>

@endsection