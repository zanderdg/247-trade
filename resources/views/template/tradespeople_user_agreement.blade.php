{{-- * Template Name : Tradespoeple-UA * --}}

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
        <h1>Trade Business User Agreement</h1>
        <p>
            Thank you for accessing our Service at http://www.247tradespeople.com (the “Website“) or through the 24/7 TradesPeople ‘Find Work’ application on your mobile device or for signing-up to one of our membership plans by telephone. Please read this Agreement carefully as it governs your use of the Service. Do not use the Service unless you wish to be bound by this Agreement because, by clicking ‘Next’ during the sign-up process and/or by signing-up to one of our membership plans over the telephone and/or continuing to use any part of the Service, you confirm your acceptance of this Agreement (which also includes the Privacy Policy, Payment Terms and Trade Business Code of Conduct).
            Please note that if you wish to access or use the Service as a Homeowner then you must read and accept the “Homeowner User Agreement” which is accessible here.
            The Service is for use in the United Kingdom only. You must not access the Service from any other jurisdiction. You are responsible for all compliance with laws and regulations which apply to you.
            This Agreement was last modified on 06 November 2020.
        </p>
        <ul>
            <li>01.	<a href="#Definitions">Definitions</a></li>
            <li>02.	<a href="#HomeownersandProjects">Homeowners and Projects</a></li>
            <li>03.	<a href="#ServiceContent">Service Content</a></li>
            <li>04.	<a href="#UseoftheService">Use of the Service</a></li>
            <li>05.	<a href="#Behaviour">Behaviour</a></li>
            <li>06.	<a href="#Payments">Payments</a></li>
            <li>07.	<a href="#Memberbenefitspremium ">Member benefits premium </a></li>
            <li>08.	<a href="#LinksandUserContent">Links and User Content</a></li>
            <li>09.	<a href="#UseofInformation">Use of Information</a></li>
            <li>10.	<a href="#ArrangementswithHomeowners">Arrangements with Homeowners</a></li>
            <li>11.	<a href="#TradeQualificationsandCertification">Trade Qualifications and Certification</a></li>
            <li>12.	<a href="#AskanExpert">Ask an Expert</a></li>
            <li>13.	<a href="#Chat">Chat</a></li>
            <li>14.	<a href="#IntellectualPropertyRights">Intellectual Property Rights</a></li>
            <li>15.	<a href="#Indemnity">Indemnity</a></li>
            <li>16.	<a href="#LimitationofLiability">Limitation of Liability</a></li>
            <li>17.	<a href="#OurRights">Our Rights</a></li>
            <li>18.	<a href="#General">General</a></li>
        </ul>

        <h2 id="Definitions">Definitions</h2>
        <p>
            We are 24/7 TRADESPEOPLE LTD Limited. Our registered company number is 12851474 and our registered office is at Kemp House 160 City Road London EC1V 2NX. Where we refer to ourselves in this Agreement, this is also taken to include (where the context allows) our group companies, affiliates, and our and/or their employees, associated and contracted persons, and persons supplying services to us or them. You can contact us via our online <a href="{{ url('contact') }}">contact form</a>.
            Where we refer to you in this Agreement, this also includes any person that accesses or uses our Service on your behalf in order to receive information which will assist them in securing Projects with Homeowners.
            The “Agreement” includes the terms set out here, the Privacy Policy, Payment Terms, and Trade Business Code of Conduct as made available via the internet and/or our “Apps” from time to time. Our “Apps” are the 24/7 Tradespeople ‘Find Work’ application and any other application that we release (each as modified and/or updated by us from time to time). When you sign up to receive our services, we will provide a “Membership Confirmation“, which confirms that we will provide the Service to you in accordance with this Agreement. We may issue this to you in electronic or hard-copy format. There will also be a tariff of charges applicable to your membership level as set out in the Membership Confirmation.
            The “Service” consists of the Website, our Apps, any pages we operate on third party social media applications, and the content and services we make available through them via the internet, mobile devices including smart phones and tablets, and/or interactive television devices and services, together with the provision by us of associated information, products and services by e-mail, telephone, fax or mail.
            Any person using the Service to publish details of projects for which they invite tenders from Trade Businesses through the Service (“Projects“) is referred to in this Agreement as a “Homeowner” and any information they upload or provide to you, and all information relating to them, is referred to as “Homeowner Information“. As part of receiving the Service, you may from time to time upload information to the Service or otherwise provide us or other users of the Service with information relating to you, your employees and/or your subcontractors (including by communicating via the Communities) (“Trade Business Information“). “Trade Business” a tradesperson using the Service to promote its business.
        </p>

        <h2 id="HomeownersandProjects">Homeowners and Projects</h2>
        <p>It is your responsibility to determine whether you wish to be considered for or undertake any Project or deal with any Homeowner. We do not vet Homeowners or their Projects on behalf of our users, and we will not be liable to you in respect of any Project or relationship with any Homeowner in any way. We therefore recommend that you carefully assess each Project and carry out whatever lawful checks you consider appropriate in relation to any Homeowner before undertaking any work for them.</p>

        <h2 id="ServiceContent">Service Content</h2>
        <p>The vast majority of the material on the Service originates from our users, and we rely on Homeowners to accurately describe their Project requirements. We have little or no editorial control over the material and we therefore cannot guarantee the accuracy, timeliness, completeness, performance or fitness for any particular purpose of the material available through the Service. We cannot accept responsibility for errors, omissions, or inaccurate material available through the Service, and make no warranty that the Service will be uninterrupted or error free, or that any defects will be corrected.
        Whilst we take steps to prevent misuse of our systems, we cannot warrant that the Service will be free of viruses or other malicious code and accept no liability for loss or damage caused from the transmission of such code. We recommend that you always use up-to-date firewalls and anti-virus software to protect your equipment and data.
        Any material you obtain from the Service is used at your own risk, and we will not be liable for any loss or damage arising out of or in connection with access or use of the Service (except to the extent that such liability cannot be excluded by law).
        </p>
    
        <h2 id="UseoftheService">Use of the Service</h2>
        <p>You may not tender for any Project which is not legal or which may not legally be performed by you.
        A core purpose of the Service is to connect Homeowners to genuine tradespeople who wish to undertake Projects for those Homeowners. The Service is therefore not for use by tradesmen who do not intend to carry out and ensure successful completion of each Project they accept. You therefore agree that you will not in any circumstance:
        </p>
        <ul>
            <li>use the Service for the purpose of reselling, exchanging or purchasing or otherwise obtaining leads from other tradesmen;</li>
            <li>pose as a Homeowner and post fake Projects whether for purposes of identifying potential tradesmen in your area with whom you may wish to work, or in order to receive information from other tradesmen about their businesses and Project proposals, or for any other purpose whatsoever.</li>
        </ul>

        <p>You agree that you will not use subcontractors on any Project without the prior consent of the relevant Homeowner. You are responsible for ensuring that you and your subcontractors are legally entitled to tender for and perform any Project for which you tender or accept. By using subcontractors on Projects obtained via the Service, you agree to procure that each of your subcontractors will also comply with the terms of this Agreement as if it were a party to it. You also acknowledge that you will be responsible to us and to all Homeowners for the acts and omissions of your subcontractors.
        We will not be a party to any contract made between you and any Homeowner and therefore we shall not be liable for any loss or damage that results from any dealings between you and any Homeowner including but not limited to any direct, indirect or consequential or inconsequential loss of any kind.
        You agree not to use the Service in any unlawful manner and in particular shall not:
        </p>
        
        <ul>
            <li>post any material that infringes any patent, trademark, copyright, trade secret or other proprietary right of any person;</li>
            <li>post any corrupted files, files that contain viruses, or any other code that may damage the operation of a computer or other electronic device;</li>
            <li>conduct or forward surveys, contests other than in Communities (as defined below) intended for such uses, and shall not forward pyramid schemes or chain letters;</li>
            <li>download any file Posted by another user of a forum that the user knows, or reasonably should know, cannot be legally distributed in such manner;</li>
            <li>impersonate another person or entity, or falsify or delete any author attributions, legal or other proper notices or proprietary designations or labels of the original or source of software or other material contained in a file that is Posted;</li>
            <li>cause the Service to be interrupted, damaged, rendered less efficient or such that the effectiveness or functionality of the Service is in any way impaired; or</li>
            <li>restrict or inhibit any other user from using and enjoying the Service.</li>
        </ul>
        <p>You agree that you will (and will ensure that your subcontractors will) comply with:</p>
        <ul>
            <li>the <a href="{{ url('privacy-policy') }}">Privacy Policy</a>;</li>
            <li>the <a href="#">Payment Terms</a>; and</li>
            <li>the <a href="#">Trade Business Code of Conduct</a></li>
        </ul>
        <p>We may notify you of Projects from time to time, but we are not under any obligation to do so. Further, because Homeowners retain the right to change or withdraw their Project from our Service, we are unable to give any warranty as to the availability or suitability of a particular Project. We do not review or confirm the accuracy of all details provided to us by Homeowners, and we therefore cannot guarantee that all leads include correct and complete information. Further, we cannot guarantee that any leads generated using the Service will result in business for you, and no refund is offered in the event that you do not obtain business from the leads generated.</p>
    
        <h2 id="Behaviour">Behaviour</h2>
        <p>You agree not to use the Service in any unlawful manner and in particular shall not:</p>
        <ul>
            <li>defame, abuse, harass, stalk, threaten or otherwise violate the legal rights (including rights of privacy and publicity) of others;</li>
            <li>publish, post, upload, distribute or disseminate (“Post”) any inappropriate, defamatory, abusive, infringing, obscene, discriminatory or otherwise unlawful material.</li>
        </ul>

        <h2 id="Payments">Payments</h2>
        <p>
            You agree to pay the fees for using the Service in accordance with the <a href="#">Payment Terms</a> and as more specifically set out in the tariff of charges in the Membership Confirmation.
        </p>
    
        <h2 id="LinksandUserContent">Links and User Content</h2>
        <p>It is not possible for us to review all websites which are linked to from the Service (or link to the Service), and you should therefore take care when following any link. We cannot accept liability for any loss or damage that may be suffered as a result of following any links. You agree not to Post links to any websites.
        The Service contains discussion forums, bulletin board services, chat areas, communities and/or other message or communication facilities (collectively “Communities”). Although our hope is that all users will use the Service responsibly, and we require all users to ensure that all content that they post on the Service is lawful, we are not responsible for reviewing or policing user content and so it is possible that Communities may carry offensive, harmful, inaccurate or otherwise inappropriate material, or in some cases, postings that have been mislabeled or are otherwise deceptive. We urge you to exercise proper judgement and to use caution and common sense when using Communities. We do not control the information delivered to the Communities, and have no obligation to monitor the Communities.
        You are responsible for your own communications and for any consequences arising out of them. The Communities are intended to allow users to send and receive messages and material that are legal, proper and related to the particular Community, and you agree that you shall use them only for this purpose.
        We do not guarantee the truthfulness, accuracy, or reliability of any communications Posted in the Communities or endorse any opinions expressed in the Communities. You should take all due care in relying on material Posted in the Communities, as this is done at your own risk.
        It is important for you to note that all Communities are public, and that others may read communications made via the Community without the author’s knowledge. Always use caution when giving out any personally identifying information about yourself in any Community, and do not give personally identifying information about any other person unless entitled to do so.
        </p>

        <h2 id="UseofInformation">Use of Information</h2>
        <p>You are solely responsible for the content, accuracy, and completeness of the Trade Business Information, and agree only to provide true, accurate, current and complete information. You also accept all liability arising out of or in connection with your processing and transmission of the Homeowner Information.
        You acknowledge that we may edit, modify or remove any parts of Trade Business Information which we consider is in breach of any of the provisions of this Agreement, and/or suspend or terminate your access to the Service without notice.
        By providing Trade Business Information you grant to us a royalty-free, perpetual, irrevocable, non-exclusive license to use, copy, reproduce, modify, publish, edit, translate, distribute, perform, and display the material alone or as part of other works in any form, media, or technology whether now known or hereafter developed, and to sub-license such rights through multiple tiers of sub-licensees. The foregoing grants shall include the right to exploit any proprietary rights in such materials, including but not limited to rights under copyright, trademark, service mark or patent laws under any relevant jurisdiction. You also waive any moral rights you have in the materials. Do not Post any materials on the Service that you would not want us to use in this way.
        We check the information that you provide on registration and during your continued use of the Service. You acknowledge and agree that we may at any time request verification and identity and address documents and information from you in order to complete our fraud prevention and identity and address verification checks which we carry out from time to time. We reserve the right to terminate the provision to you of the Service or restrict your access to the Service at any time in the event that you fail to provide all of the requested verification and identity and address documents within the requested timescale or if you do not pass our fraud prevention or identity verification checks.
        You consent to information about the device you use to access the Service and verification, identity and address documentation being collected and processed for fraud prevention purposes and we may use third parties (and information they provide) to help us prevent fraud or unauthorised access to our Service.
        You agree not to copy, reproduce, modify, create derivative works from, distribute or publicly display any content (except for your Trade Business Information) from the Service without our prior written permission.
        To the extent that we provide you with Homeowner Information, you agree that you shall:
        </p>
        <ul>
            <li>treat the Homeowner Information as confidential and not share the information with any other person;</li>
            <li>only use the Homeowner Information for the purpose of contacting them in relation to the particular Project for which you were provided with the information, and for no other purpose whatsoever;</li>
            <li>at all times and in all respects comply with data protection law.</li>
        </ul>
        
        <h2 id="ArrangementswithHomeowners">Arrangements with Homeowners</h2>
        <p>Our review system is designed to provide Homeowners with independent feedback on the quality, value and reliability of trade businesses. Furthermore, your willingness to be reviewed may provide Homeowners with a level of confidence regarding the Trade Business’ ability. A key reason that Projects are made available through the Service is that Homeowners are able to read reviews by your previous customers. You therefore agree that your performance in carrying out each Project may be reviewed  by the applicable Homeowner and that the reviews and reviews will be published on the Service.
        Should you (or any of your subcontractors) have a dispute with a Homeowner, you must address such dispute directly to the Homeowner concerned. However, you agree to notify the details of the dispute to us as soon as reasonably practicable.
        We may decide to investigate any grievances held by you or by Homeowners and may discuss any such investigation with all involved parties. We may take any lawful action we deem necessary in the event of a grievance, but likely outcomes of a grievance investigation include:
        </p>
        <ul>
            <li>you and the Homeowner being allowed to continue using the Service;</li>
            <li>your and/or the Homeowner’s access to the Service being suspended for a period of time;</li>
            <li>your and/or the Homeowner’s access to the Service being terminated and banned for a definite or indefinite period.</li>
        </ul>
        <p>In the event of a suspension or termination, no further fees shall accrue to the extent that access to the Service is suspended or terminated. However, any fees already accrued shall become immediately payable.
        Save as provided above, we cannot be involved in your dealings with Homeowners and, in the event that you have a dispute with one or more Homeowners, you hereby release (and shall procure that your subcontractors release) us from any and all claims, demands and damages of every kind and nature, known and unknown, suspected and unsuspected, disclosed and undisclosed, arising out of or in any way connected with such disputes.
        </p>
    
        <h2 id="TradeQualificationsandCertification">Trade Qualifications and Certification</h2>
        <p>Where you advise us that you (or your subcontractors) are Part P, gas, or otherwise certified, we may verify the relevant certification. However the validity of the certificate always remains your responsibility.
        We advise Homeowners to request sight of evidence of applicable trade accreditations or registrations, CRB checks and solvency checks (as applicable) prior to work commencing on a Project. You agree to comply with any reasonable requests submitted by the Homeowners with regards to the verification of such accreditations, registrations or information.
        Any checks on trade accreditations or registrations that we carry out do not reduce your obligation to ensure that all your subcontractors and any personnel involved in the Project have the required trade accreditation or registration to carry out specific aspects of the Project.
        </p>
    
        <h2 id="AskanExpert">Ask an Expert</h2>
        <p>We may invite you to participate in Ask an Expert if you are a member of 24/7 TradesPeople and have received a total of 5 or more reviewss from our Homeowners, with an average review from our Homeowners of 4.5 stars or above. Your most recent 2 reviews from Homeowners must also be 4 stars or higher at the point which you are invited to join. This is a question and answer panel in which Homeowners can ask questions on the Service relating to home renovation challenges for experts to answer. If you agree to take part in this as an expert, then you agree that you are responsible for the advice, information or comment you provide and that you are acting in your capacity as an independent Trade Business. In so doing, you agree that you shall use all due care and skill when Posting advice, information or comment.
        You agree to indemnify us for any loss, damage and expense of any kind (including reasonable legal fees and costs) suffered or incurred by us in connection with any actual or threatened claim or allegations by any person arising in connection with any advice or information you provide, or comment that you make.
        </p>
        
        <h2 id="Chat">Chat</h2>
        <p>Our chat feature enables you, the tradesperson, to talk and share content with homeowners on our site. This includes, but is not limited to, sharing text, images and video. To protect any personal information that is shared via chat, at no point should content be copied, shared, re-posted or repurposed to any other platform or site.
        We take no responsibility for any of the content posted using our chat feature, either by yourself or anyone you are in conversation with via the chat feature. We do not monitor the messages sent via chat but do retain the right to use or edit anything posted in a chat message or remove any content that breaks this User Agreement. We also reserve the right to share any or all content deemed inappropriate, or that relates to a criminal investigation, to the relevant authorities.
        Any additional work that is agreed with a homeowner via chat, which falls outside the scope of the original job posted by the homeowner to the 24/7 TradesPeople platform and without a related follow up job being created, will fall outside of the 24/7 TradesPeople service and no further contractual agreements will be made involving 24/7 TradesPeople.
        Should you, or anyone, post content we deem inappropriate or that contravenes this User Agreement, we reserve the right to permanently remove you, or that user, from our service.
        If you need to report abuse or the posting of offensive, inappropriate or illegal content via chat, please <a href="{{ url('contact') }}">contact us</a> with details and our team will investigate.
        </p>

        <h2 id="IntellectualPropertyRights">Intellectual Property Rights</h2>
        <p>You acknowledge that all present and future copyright and other intellectual property rights subsisting in, or used in connection with, the Service and any part of it (the “Rights“), including the manner in which the Service is presented or appears and all information and documentation relating to it is our property (or that of our licensors), and nothing in this Agreement shall be taken to transfer any of the Rights to you.
        Solely for the purposes of receiving the Service, we hereby grant to you for the period during which the Service is provided a non-exclusive, non-transferable, licence to use the Rights.
        </p>

        <h2 id="Indemnity">Indemnity</h2>
        <p>It is your responsibility to ensure that you are entitled to provide the Trade Business Information and you therefore agree to indemnify us against any and all expenses, damages and losses of any kind (including reasonable legal fees and costs) incurred by us in connection with any actual or threatened claims of any kind (including without limitation any claim of trademark or copyright infringement, defamation, breach of confidentiality, false or misleading advertising or sales practices) arising from your (or your subcontractors’) provision of Trade Business Information or arising from your (or your subcontractors’) use of the Service.
        We shall indemnify you against any and all expenses, damages and losses of any kind (including reasonable legal fees and costs) incurred by you in connection with any actual or threatened claims of any kind (including without limitation any claim of trademark or copyright infringement, defamation, breach of confidentiality, false or misleading advertising or sales practices) that any material on the Service generated and uploaded by us infringes the intellectual property of any third party.
        </p>

        <h2 id="LimitationofLiability">Limitation of Liability</h2>
        <p>Notwithstanding any other provision, nothing in this Agreement shall exclude or limit either party’s liability for death or personal injury caused by that party’s negligence, fraud or fraudulent misrepresentation, or any other liability that cannot lawfully be excluded or limited.
        If you are dissatisfied with the Service, or the terms of this Agreement, your sole remedy under this Agreement shall be to discontinue use of the Service. In the event that your dissatisfaction arises due to an act or omission by us constituting a material breach of this Agreement, you may also claim a refund of the fees paid by you in consideration for the Service in the twelve months prior to the occurrence of the circumstances constituting such material breach. If you register as both a Homeowner and as a Trade Business then the aggregate cap in this Agreement shall apply – the caps shall not be cumulative.
        Other than as set out above in this Limitation of Liability section, and notwithstanding any other provision of this Agreement, we shall not be liable in contract, tort, negligence, statutory duty, misrepresentation or otherwise, for any loss or damage whatsoever arising from or in any way connected with this Agreement.
        We shall not be liable for any loss of business, loss of profits, business interruption, loss of business information, loss of data, or any other pecuniary loss (even where we have been advised of the possibility of such loss or damage).
        Save as expressly set out herein, all conditions, warranties and obligations which may be implied or incorporated into this Agreement by statute, common law, or otherwise and any liabilities arising from them are hereby expressly excluded to the extent permitted by law.
        Without limiting the foregoing, we shall have no liability for any failure or delay resulting from any matter beyond our reasonable control.
        We cannot guarantee the day or time that we will respond to any email, telephone or written enquiries or Website form submissions.
        Each of the provisions of this Clause shall be construed separately and independently of the others.
        </p>

        <h2 id="OurRights">Our Rights</h2>
        <p>We reserve the right at all times to edit, refuse to post, or to remove from the Service any information or materials for any reason whatsoever, and to disclose any information we deem appropriate to satisfy any applicable law, regulation, legal process, police request or governmental request.
        We reserve the right to terminate the provision to you of the Service or restrict your access to the Service at any time without notice for any reason whatsoever (provided that no further fees shall accrue for the terminated Service after the date of such termination). If we terminate the provision to you of the Service under this paragraph:
        </p>
        <ul>
            <li>if you have pre-paid for a period of the Service extending beyond the termination date, we shall refund you a pro-rata amount in respect of the pre-paid fees for that period save that we shall be entitled to deduct an amount equivalent to the value of any Lead Credits which have been included in your Membership Plan for such period which you have spent prior to the date of termination; and</li>
            <li>if you have selected a Minimum Term Membership Plan, you will have to pay Membership Fees to cover the period from the date of termination until expiry of the Minimum Term. Membership Fees, Minimum Term and Minimum Term Membership Plan shall have the meanings given to them in the Payment Terms.</li>
        </ul>
        <p>Without prejudice to the generality of the above, we reserve the right to terminate the provision to you of the Service or restrict your access to the Website at any time immediately on giving you notice:</p>
        <ul>
            <li>in the event that you are or we suspect you to be in material breach of any term of this Agreement (which shall include, without limitation, where payments due from you are overdue by 14 days or more) which is either irremediable or, if it is remediable, you do not remedy it within 7 days of us notifying you of the breach;</li>
            <li>if you file for bankruptcy or are bankrupt, go into liquidation (whether compulsory or voluntary) otherwise than for the purposes of a bona fide amalgamation or reconstruction, or an administrator or receiver or similar officer is appointed over the whole or any part of your assets, or you enter into any arrangement for the benefit of or compound with your creditors generally, or threaten to do any of these things, or any judgment is made against you, or any similar occurrence under any jurisdiction affects you; or you cease or threaten to cease to carry on business; and/or</li>
            <li>in the event you breach, or we reasonably suspect you have breached, the Trade Business Code of Conduct.</li>
        </ul>
        <p>If we terminate your access to the Services under the above paragraph, if you have pre-paid for a period of the Service extending beyond the termination date, you will not be entitled to any refund. You acknowledge that we are only able to offer the Membership Fees and other benefits applicable to Minimum Term Membership Plans by making such Membership Plans available on a fixed term basis. If you have selected a Minimum Term Membership Plan and we terminate your access to the Services under the above paragraph, on termination we are entitled to invoice you for Membership Fees to cover the period from the date of termination until expiry of the Minimum Term and you agree to pay the invoiced amount within 14 days of the date of invoice.
        We reserve the right to modify or discontinue temporarily or permanently all or part of the Service with or without notice without liability for any modification or discontinuance, save as expressly set out in this Agreement.
        We may vary the terms of this Agreement from time to time and shall post such alterations on the Website. If the variations to the terms of this Agreement are materially detrimental to you we will give you written notice of such variations and if you do not agree to such variations then you have the right to notify us that you wish to cancel your membership and to stop using the Service, and you should do so immediately (and in any event within 14 days of us notifying you of the variation). If you cancel the Agreement under this paragraph, then
        </p>
        <ul>
            <li>if you have pre-paid for a period of the Service extending beyond the cancellation date, we shall refund you on a pro-rata amount in respect of the pre-paid fees for that period (less any reasonable administration fee) save that we shall be entitled to deduct an amount equivalent to the value of any Lead Credits which have been included in your Membership Plan for such period which you have spent prior to the date of termination; and</li>
            <li>if you have selected a Minimum Term Membership Plan, you will not have to pay Membership Fees to cover the period from the date of cancellation until expiry of the Minimum Term.</li>
        </ul>
        <p>Your continued use of the Service after the date the changes have been posted will constitute acceptance of the amended Agreement
        Accounts which are opened but remain unused result in wasted costs being incurred by us to support those accounts. In the event that your account remains inactive for a period exceeding 30 days, we may at our discretion give you written notice of our intention to discontinue Service provision on that account. If we do not receive confirmation from you that the account is required within 14 days of the date of our notice to you, and you have not re-commenced use of the account within a further 14 days, we may discontinue Service provision on that account. We will not discontinue Service provision in accordance with this paragraph for any account which is subject to a Minimum Term Membership Plan during the applicable Minimum Term or any account for which you have pre-paid for the Service during the period for which the pre-paid fees apply.
        </p>

        <h2 id="General">General</h2>
        <p>Clause headings are inserted for convenience only and shall not affect the interpretation of this Agreement.
        If any provisions hereof are held to be illegal or unenforceable such provisions shall be severed and the remainder of this Agreement shall remain in full force and effect unless the business purpose of this Agreement is substantially frustrated, in which case it shall terminate without giving rise to further liability.
        You may not assign, transfer or sub-contract any of your rights hereunder without our prior written consent. We may assign, transfer or sub-contract all or any of our rights at any time without consent.
        No waiver shall be effective unless in writing, and no waiver shall constitute a continuing waiver so as to prevent us from acting upon any continuing or subsequent breach or default.
        This Agreement constitutes the entire agreement as to its subject matter and supersedes and extinguishes all previous communications, representations (other than fraudulent misrepresentations) and arrangements, whether written or oral with the exception of the Terms of Use and/or the Homeowner User Agreement where these have been entered into. To the extent that there is any conflict between them, those agreements shall apply in the following order of precedence:
        </p>
        <ul>
            <li>this Trade Business User Agreement;</li>
            <li>the Terms of Use.</li>
            <li>the Homeowner User Agreement; then</li>
        </ul>
        <p>
        You acknowledge that you have placed no reliance on any representation made but not set out expressly in this Agreement.
        Any notice to be given under this Agreement may be given via e-mail, regular mail, or by hand to the address provided on the Website or otherwise as notified by one party to the other.
        Nothing herein shall create or be deemed to create any joint venture, principal-agent or partnership relationship between the parties and neither party shall hold itself out in its advertising or otherwise in any manner which would indicate or imply any such relationship with the other.
        Notwithstanding any other provision in this Agreement a person who is not a party hereto has no right under the Contracts (Rights of Third Parties) Act 1999 to rely upon or enforce the terms of this Agreement.
        This Agreement shall be subject to the laws of England and the parties shall submit to the exclusive jurisdiction of the English courts.
        In the event of any comments or questions regarding this Agreement (including the <a href="{{ url('privacy-policy') }}">Privacy Policy</a>, <a href="#">Payment Terms</a>, and <a href="#">Trade Business Code of Conduct</a>) then please <a href="{{ url('contact') }}">Contact Us</a>.
        </p>

    </div>
@endsection