<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
} else {
    if (isset($_COOKIE['email'], $_COOKIE['password'])) {
        $url = "../auth?back=legalnotice";
        header("Location: $url");
        exit;
    } else {
        $logged = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="PersoLib is an open-source project that allows individuals to share their personality data with others." />
    <meta name="keywords"
        content="personality, libary, exchange, explore, perso, dating, friends, personalitylib, personalitylib.com, justwait" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="English" />
    <meta name="revisit-after" content="2 days" />
    <meta name="author" content="JustWait" />
    <!-- BOOTTSTRAP -->
    <script src="../public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../public/favicon.ico" type="image/x-icon">
    <title>Legal Notice</title>
    <meta name="title" content="Legal Notice" />
    <link rel="stylesheet" href="../public/css/legalnotice.css" />
    <!--Cookies-->
    <script
        src="https://cloud.ccm19.de/app.js?apiKey=48e8ec3f458ee0e3f9c85ab9e5753ed1313c04578c8b397d&amp;domain=65fb450aaaca388c810eafb2"
        referrerpolicy="origin"></script>
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="hstack gap-2">
        <h1 class="titel p-2"><a href="https://personalitylib.com/">PersonalityLib</a></h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item"><a href="https://personalitylib.com">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Legal Notice</li>
            </ol>
        </nav>

        <div class="link-tree p-2 ms-auto">
            <button type="button" class="btn btn-outline-primary home" onclick="window.location.href='..'">
                Home
            </button>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <?php $auth = "../auth"; $profile = "../profile"; $logout = "../auth/logout"; $about = "../about"; $personality = "../profile/new";?>
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='<?php if($logged == true){echo $profile;}else{echo $auth;}?>'">
                    <?php if($logged == true){echo "Profile";}else{echo "LogIn";}?>
                </button>
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='<?php echo $personality;?>'">
                    <?php if($logged == true){echo "Personality";}else{echo "Create";}?>
                </button>
                <button type="button" class="btn btn-outline-primary"
                    onclick="window.location.href='<?php if($logged == true){echo $logout;}else{echo $about;}?>'">
                    <?php if($logged == true){echo "Logout";}else{echo "About";}?>
                </button>
            </div>
        </div>
    </header>
    <main class="z-0">
        <div class="legal-card">
            <div class="card text-center">
                <div class="card-header">
                    <strong>Legal Notice</strong>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Data in accordance with Section 5 TMG</h5>
                    <p class="card-text">
                        <br><strong>Kontaktdaten:</strong> <br>
                        Diego Reim <br>
                        <a href="mailto:info@personalitylib.com">info@personalitylib.com</a><br>
                        <a href="https://www.personalitylib.com">personalitylib.com</a><br><br>
                        <strong>Disclaimer:</strong><br>
                        <strong>Responsibility for content</strong>
                        The contents of our websites were created with the greatest care. Nevertheless, we cannot
                        guarantee that the
                        content is current, reliable or complete. In accordance with legal regulations, we are
                        responsible for the
                        content we create ourselves. In this context, we would like to make it clear that we are not
                        responsible for
                        information provided by or collected by third parties. We do not control the information that is
                        sent, nor
                        do we track possible illegal activities. If illegal activities are discovered, we follow our
                        obligation to
                        block or delete the relevant content in accordance with paragraphs 8 to 10 of the Telemedia Act
                        (TMG).
                        <strong>Responsibility for links</strong>
                        Responsibility for the content of third-party links (external content) lies with the respective
                        website
                        operators. At the time the links used were inserted on our pages, no illegal activities were
                        detected on
                        them. As soon as we become aware of illegal activities or violations, we will remove the
                        corresponding link.
                        <strong>Copyright</strong>
                        Our websites and their content (texts, photos, graphics, design) are subject to German copyright
                        law. Unless
                        otherwise agreed by law, the use, reproduction, copying or modification of the content is
                        subject to
                        copyright. Exceptions must be approved in writing by the website operators or rights holders.
                        Individual
                        copies are only permitted for private use; they may not be used directly or indirectly for
                        commercial
                        purposes. Unauthorized use of copyrighted material is punishable under Section 106.
                    </p>
                </div>
                <div class="card-footer text-body-secondary">
                    <strong>Repräsentiert von:</strong> <br>
                    PersonalityLib<br>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="legal-card">
            <div class="card text-center">
                <div class="card-header">
                    <strong>Privacy Policy</strong>
                </div>
                <div class="card-body">
                    <p class="card-text">
                    <h2 id="einleitung-ueberblick" class="adsimple-312701248">Introduction and overview</h2>
                    <p>We have written this data protection declaration (version 01/12/2024-312701248) to provide you
                        with the
                        requirements of <a class="adsimple-312701248"
                            href="https://eur-lex.europa.eu/legal-content /DE/TXT/HTML/?uri=CELEX:32016R0679&amp;from=DE&amp;tid=312701248#d1e2269-1-1"
                            target="_blank" rel="noopener">General Data Protection Regulation (EU) 2016/679</a> and
                        applicable
                        national laws to explain which personal data (in short data) we as controllers &#8211; and the
                        processors
                        commissioned by us (e.g. providers) &#8211; process, will process in the future and what legal
                        options you
                        have. The terms used are to be understood as gender-neutral.<br />
                        <strong class="adsimple-312701248">In short:</strong> We will inform you comprehensively about
                        the data we
                        process about you.
                    </p>
                    <p>Privacy policies usually sound very technical and use legal terms. This data protection
                        declaration,
                        however, is intended to describe the most important things to you as simply and transparently as
                        possible.
                        To the extent that it promotes transparency, technical terms are explained in a reader-friendly
                        manner,
                        links to further information are provided and graphics are used brought. We thereby inform you
                        in clear and
                        simple language that we only process personal data as part of our business activities if there
                        is a
                        corresponding legal basis. This is certainly not possible if you make as brief, unclear and
                        legal-technical
                        statements as possible, as are often standard on the Internet when it comes to data protection.
                        I hope you
                        find the following explanations interesting and informative and perhaps there is one or two
                        pieces of
                        information that you didn't know before.<br />
                        If you still have questions, we would like to ask you to contact the responsible body named
                        below or in the
                        legal notice, follow the existing links and look at further information on third-party sites.
                        You can of
                        course also find our contact details in the legal notice.</p>
                    <h2 id="application scope" class="adsimple-312701248">Application scope</h2>
                    <p>This data protection declaration applies to all personal data processed by us in the company and
                        to all
                        personal data that companies commissioned by us (processors) process. By personal data we mean
                        information
                        within the meaning of Article 4 No. 1 GDPR such as a person's name, email address and postal
                        address. The
                        processing of personal data ensures that we can offer and bill our services and products,
                        whether online or
                        offline. The scope of this data protection declaration includes:</p>
                    <ul class="adsimple-312701248">
                        <li class="adsimple-312701248">all online presences (websites, online shops) that we operate
                        </li>
                        <li class="adsimple-312701248">Social media presence and email communication</li>
                        <li class="adsimple-312701248">mobile apps for smartphones and other devices</li>
                    </ul>
                    <p>
                        <strong class="adsimple-312701248">In short:</strong> The data protection declaration applies to
                        all areas
                        in which personal data is processed in a structured manner within the company via the channels
                        mentioned. If
                        we enter into legal relationships with you outside of these channels, we will inform you
                        separately if
                        necessary.
                    </p>
                    <h2 id="legal basis" class="adsimple-312701248">Legal basis</h2>
                    <p>In the following data protection declaration we provide you with transparent information about
                        the legal
                        principles and regulations, i.e. the legal bases of the General Data Protection Regulation,
                        which enable us
                        to process personal data.<br />
                        As far as EU law is concerned, we refer to REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT
                        AND OF THE
                        COUNCIL of April 27, 2016. You can of course access this EU General Data Protection Regulation
                        online on
                        EUR-Lex, the access to the EU -Law, under <a class="adsimple-312701248"
                            href="https://eur-lex.europa.eu/legal-content/DE/ALL/?uri=celex%3A32016R0679">https://eur-
                            lex.europa.eu/legal-content/DE/ALL/?uri=celex%3A32016R0679</a> read it.</p>
                    <p>We only process your data if at least one of the following conditions applies:</p>
                    <ol>
                        <li class="adsimple-312701248">
                            <strong class="adsimple-312701248">Consent</strong> (Article 6 paragraph 1 lit. a GDPR): You
                            have given us
                            your consent to process data for a specific purpose. An example would be saving the data you
                            entered in a
                            contact formars.
                        </li>
                        <li class="adsimple-312701248">
                            <strong class="adsimple-312701248">Contract</strong> (Article 6 paragraph 1 lit. b GDPR): In
                            order to
                            fulfill a contract or pre-contractual obligations with you, we process your data. For
                            example, if we
                            conclude a purchase contract with you, we need personal information in advance.
                        </li>
                        <li class="adsimple-312701248">
                            <strong class="adsimple-312701248">Legal obligation</strong> (Article 6 paragraph 1 lit. c
                            GDPR): If we
                            are subject to a legal obligation, we process your data. For example, we are legally obliged
                            to keep
                            invoices for accounting purposes. These usually contain personal data.
                        </li>
                        <li class="adsimple-312701248">
                            <strong class="adsimple-312701248">Legitimate interests</strong> (Article 6 paragraph 1 lit.
                            f GDPR): In
                            the case of legitimate interests that do not restrict your fundamental rights, we reserve
                            the right to
                            process personal data. For example, we need to process certain data in order to operate our
                            website
                            securely and economically efficiently. This processing is therefore a legitimate interest.
                        </li>
                    </ol>
                    <p>Other conditions such as the perception of recordings in the public interest and the exercise of
                        public
                        authority as well as the protection of vital interests do not generally apply to us. If such a
                        legal basis
                        is relevant, it will be shown in the appropriate place.</p>
                    <p>In addition to the EU regulation, national laws also apply:</p>
                    <ul class="adsimple-312701248">
                        <li class="adsimple-312701248">In <strong class="adsimple-312701248">Austria</strong> this is
                            the Federal
                            Law on the Protection of Natural Persons with regard to the Processing of Personal Data
                            (<strong class="adsimple-312701248">). Data Protection Act</strong>, short <strong
                                class="adsimple-312701248">DSG</strong>.</li>
                        <li class="adsimple-312701248">In <strong class="adsimple-312701248">Germany</strong> the
                            <strong class="adsimple-312701248">Federal Data Protection Act</strong>, or <strong
                                class=" for short," applies. adsimple-312701248">BDSG</strong>.
                        </li>
                    </ul>
                    <p>If other regional or national laws apply, we will inform you about them in the following
                        sections.</p>
                    <h2 id="kontaktdaten- Responsible" class="adsimple-312701248">Contact details of the person
                        responsible</h2>
                    <p>If you have any questions about data protection or the processing of personal data, you will find
                        the
                        contact details of the responsible person or body below:<br />
                        <span class="adsimple-312701248" style="font-weight: 400">PersonalityLib<br />
                            Diego Reim</span>
                        <br />
                        <span style="font-weight: 400">Authorized representative: Diego Reim</span>
                        <br />
                        Email: <a href="mailto:info@personalitylib.com">info@personalitylib.com</a>
                    </p>
                    <p>Imprint: <a
                            href="https://personalitylib.com/pages/legalnotice/">https://personalitylib.com/pages/legalnotice/</a>
                    </p>
                    <h2 id="storage duration" class="adsimple-312701248">Storage duration</h2>
                    <p>It is a general criterion for us that we only store personal data for as long as it is absolutely
                        necessary
                        to provide our services and products. This means that we delete personal data as soon as the
                        reason for data
                        processing no longer exists. In some cases, we are legally obliged to store certain data even
                        after the
                        original purpose has ceased, for example for accounting purposes.</p>
                    <p>If you wish to have your data deleted or revoke your consent to data processing, the data will be
                        deleted
                        as quickly as possible and provided there is no obligation to store it.</p>
                    <p>We will inform you below about the specific duration of the respective data processing, provided
                        we have
                        further information.</p>
                    <h2 id="rechte-dsgvo" class="adsimple-312701248">Rights according to the General Data Protection
                        Regulation
                    </h2>
                    <p>In accordance with Articles 13, 14 GDPR, we inform you of the following rights to which you are
                        entitled so
                        that data is processed fairly and transparently:</p>
                    <ul class="adsimple-312701248">
                        <li class="adsimple-312701248">According to Article 15 GDPR, you have a right to information
                            about whether
                            we process your data. If this is the case, you have the right to receive a copy of the data
                            and to know
                            the following information:
                            <ul class="adsimple-312701248">
                                <li class="adsimple-312701248">for what purpose we carry out the processing;</li>
                                <li class="adsimple-312701248">the categories, i.e. the types of data that are
                                    processed;</li>
                                <li class="adsimple-312701248">who receives this data and if the data is transferred to
                                    third countries,
                                    how security can be guaranteed;</li>
                                <li class="adsimple-312701248">how long the data is stored;</li>
                                <li class="adsimple-312701248">the existence of the right to rectification, deletionor
                                    restriction of
                                    processing and the right to object to processing;</li>
                                <li class="adsimple-312701248">that you can complain to a supervisory authority (links
                                    to these
                                    authorities can be found below);</li>
                                <li class="adsimple-312701248">the origin of the data if we did not collect it from you;
                                </li>
                                <li class="adsimple-312701248">whether profiling is carried out, i.e. whether data is
                                    automatically
                                    evaluated in order to create a personal profile for you.</li>
                            </ul>
                        </li>
                        <li class="adsimple-312701248">According to Article 16 GDPR, you have the right to rectification
                            of data,
                            which means that we must correct data if you find errors.</li>
                        <li class="adsimple-312701248">According to Article 17 GDPR, you have the right to deletion
                            (“right to be
                            forgotten”), which specifically means that you can request the deletion of your data.</li>
                        <li class="adsimple-312701248">According to Article 18 GDPR, you have the right to restrict
                            processing,
                            which means that we are only allowed to store the data but not use it any further.</li>
                        <li class="adsimple-312701248">According to Article 20 GDPR, you have the right to data
                            portability, which
                            means that upon request we will provide you with your data in a common format.</li>
                        <li class="adsimple-312701248">According to Article 21 GDPR, you have a right to object, which,
                            once
                            enforced, will result in a change to the processing.
                            <ul class="adsimple-312701248">
                                <li class="adsimple-312701248">If the processing of your data is based on Article 6
                                    Paragraph 1 Letter e
                                    (public interest, exercise of official authority) or Article 6 Paragraph 1 Letter f
                                    (legitimate
                                    interest), you can object object to the processing. We will then check as quickly as
                                    possible whether
                                    we can legally comply with this objection.</li>
                                <li class="adsimple-312701248">If data is used to conduct direct advertising, you can
                                    object to this
                                    type of data processing at any time. We may then no longer use your data for direct
                                    marketing.</li>
                                <li class="adsimple-312701248">If data is used to carry out profiling, you can object to
                                    this type of
                                    data processing at any time. We are then no longer allowed to use your data for
                                    profiling.</li>
                            </ul>
                        </li>
                        <li class="adsimple-312701248">According to Article 22 GDPR, you may have the right not to be
                            subject to a
                            decision based solely on automated processing (e.g. profiling).</li>
                        <li class="adsimple-312701248">According to Article 77 GDPR, you have the right to complain.
                            This means that
                            you can complain to the data protection authority at any time if you believe that the
                            processing of
                            personal data violates the GDPR.</li>
                    </ul>
                    <p>
                        <strong class="adsimple-312701248">In short:</strong> You have rights &#8211; Do not hesitate to
                        contact the
                        responsible body listed above!
                    </p>
                    <p>If you believe that the processing of your data violates data protection law or your data
                        protection rights
                        have been violated in any other way, you can complain to the supervisory authority. For Austria,
                        this is the
                        data protection authority, whose website you can visit at <a class="adsimple-312701248"
                            href="https://www.dsb.gv.at/?tid=312701248" target="_blank"
                            rel="noopener">https://www.dsb.gv.at/</a>. In
                        Germany there is a data protection officer for each federal state. For more information, you can
                        contact <a class="adsimple-312701248" href="https://www.bfdi.bund.de/DE/Home/home_node.html"
                            target="_blank" rel="noopener">Federal Commissioner for Data Protection and Freedom of
                            Information (BfDI)</a>. The
                        following local data protection authority is responsible for our company:</p>
                    <h2 id="cookies" class="adsimple-312701248">Cookies</h2>
                    <table border="1" cellpadding="15">
                        <tbody>
                            <tr>
                                <td>
                                    <strong class="adsimple-312701248">Cookies Summary</strong>
                                    <br />
                                    &#x1f465; Affected: Visitors to the website<br />
                                    &#x1f91d; Purpose: depending on the respective cookie. You can find more details
                                    about this below or
                                    from the manufacturer of the software that sets the cookie.<br />
                                    &#x1f4d3; Processed data: Depending on the cookie used. You can find more details
                                    about this below or
                                    from the manufacturer of the software that sets the cookie.<br />
                                    &#x1f4c5; Storage period: depending on the respective cookie, can vary from hours to
                                    years<br />
                                    &#x2696;&#xfe0f; Legal basis: Art. 6 Para. 1 lit. a GDPR (consent), Art. 6 Para. 1
                                    lit.f GDPR
                                    (legitimate interests)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="adsimple-312701248">What are cookies?</h3>
                    <p>Our website uses HTTP cookies to store user-specific data.<br />
                        Below we explain what cookies are and why they are used so that you can better understand the
                        following data
                        protection declaration.</p>
                    <p>Whenever you surf the Internet, you use a browser. Well-known browsers include Chrome, Safari,
                        Firefox,
                        Internet Explorer and Microsoft Edge. Most websites store small text files in your browser.
                        These files are
                        called cookies.</p>
                    <p>One thing cannot be denied: Cookies are really useful little helpers. Almost all websites use
                        cookies. To
                        be more precise, they are HTTP cookies, as there are also other cookies for other areas of
                        application. HTTP
                        cookies are small files that our website stores on your computer. These cookie files are
                        automatically
                        stored in the cookie folder, the “brain” so to speak. your browser. A cookie consists of a name
                        and a value.
                        When defining a cookie, one or more attributes must also be specified.</p>
                    <p>Cookies store certain user data about you, such as language or personal site settings. When you
                        visit our
                        site again, your browser sends the “user-related” information back to our site. Thanks to
                        cookies, our
                        website knows who you are and offers you the settings you are used to. In some browsers, each
                        cookie has its
                        own file, in others, such as Firefox, all cookies are stored in a single file.</p>
                    <p>The following graphic shows a possible interaction between a web browser such as: B. Chrome and
                        the web
                        server. The web browser requests a website and receives a cookie back from the server, which the
                        browser
                        uses again as soon as another page is requested.</p>
                    <p>
                        <img role="img"
                            src="https://www.adsimple.at/wp-content/uploads/2018/03/http-cookie-interaction.svg"
                            alt="HTTP cookie interaction between browser and web server" width="100%" />
                    </p>
                    <p>There are both first-party cookies and third-party cookies. First-party cookies are created
                        directly by our
                        site, third-party cookies are created by partner websites (e.g. Google Analytics). Each cookie
                        must be
                        evaluated individually because each cookie stores different data. The expiry time of a cookie
                        also varies
                        from a few minutes to a few years. Cookies are not software programs and do not contain viruses,
                        Trojans or
                        other “malicious” things. Cookies also cannot access information on your PC.</p>
                    <p>For example, cookie data may look like this:</p>
                    <p>
                        <strong class="adsimple-312701248">Name:</strong> _ga<br />
                        <strong class="adsimple-312701248">Value:</strong> GA1.2.1326744211.152312701248-9<br />
                        <strong class="adsimple-312701248">Purpose:</strong> Differentiation of website visitors<br />
                        <strong class="adsimple-312701248">Expiry date:</strong> after 2 years
                    </p>
                    <p>A browser should be able to support these minimum sizes:</p>
                    <ul class="adsimple-312701248">
                        <li class="adsimple-312701248">At least 4096 bytes per cookie</li>
                        <li class="adsimple-312701248">At least 50 cookies per domain</li>
                        <li class="adsimple-312701248">At least 3000 cookies in total</li>
                    </ul>
                    <h3 class="adsimple-312701248">What types of cookies are there?</h3>
                    <p>The question of which cookies we use in particular depends on the services used and is clarified
                        in the
                        following sections of the data protection declaration. At this point we would like to briefly
                        discuss the
                        different types of HTTP cookies.</p>
                    <p>There are 4 types of cookies:</p>
                    <p>
                        <strong class="adsimple-312701248">Essential cookies<br />
                        </strong>These cookies are necessary to ensure basic functions of the website. For example,
                        these cookies
                        are needed when a user puts a product in the shopping cart, then continues surfing on other
                        pages and only
                        later checks out. These cookies do not delete the shopping cart, even if the user closes their
                        browser
                        window.
                    </p>
                    <p>
                        <strong class="adsimple-312701248">Purpose cookies<br />
                        </strong>These cookies collect information about user behavior and whether the user receives any
                        error
                        messages. These cookies are also used to measure the loading time and behavior of the website on
                        different
                        browsers.
                    </p>
                    <p>
                        <strong class="adsimple-312701248">Targeting cookies<br />
                        </strong>These cookies ensure better user experience. For example, entered locations, font sizes
                        or form
                        data are saved.
                    </p>
                    <p>
                        <strong class="adsimple-312701248">Advertising cookies<br />
                        </strong>These cookies are also called targeting cookies. They serve to provide the user with
                        individually
                        tailored advertising. This can be very practical, but also very annoying.
                    </p>
                    <p>When you first visit a website, you will usually be asked which of these types of cookies you
                        would like to
                        allow. And of course this decision is also saved in a cookie.</p>
                    <p>If you would like to know more about cookies and are not afraid of technical documentation, we
                        recommend <a class="adsimple-312701248"
                            href="https://datatracker.ietf.org/doc/html/rfc6265">https://datatracker.ietf.org/doc/html/rfc6265</a>, the
                        Request for Comments of Internet Engineering Task Force (IETF) called &#8220;HTTP State
                        Management
                        Mechanism&#8221;.</p>
                    <h3 class="adsimple-312701248">Purpose of processing via cookies</h3>
                    <p>The purpose ultimately depends on the respective cookie. You can find more details about this
                        below or from
                        the manufacturer of the software that sets the cookie.</p>
                    <h3 class="adsimple-312701248">What data is processed?</h3>
                    <p>Cookies are little helpers for many different tasks. Unfortunately, it is not possible to
                        generalize which
                        data is stored in cookies, but we will inform you about the data processed or stored in the
                        following data
                        protection declaration.</p>
                    <h3 class="adsimple-312701248">Storage period for cookies</h3>
                    <p>The storage period depends on the respective cookie and is further specified below. Some cookies
                        are
                        deleted after less than an hour, others can remain on a computer for several years.</p>
                    <p>You also have an influence on the storage period. You can delete all cookies manually at any time
                        via your
                        browser (see also “Right to object” below). Furthermore, cookies that are based on consent will
                        be deleted
                        at the latest after you revoke your consent, although the legality of storage remains unaffected
                        until then.
                    </p>
                    <h3 class="adsimple-312701248">Right to object &#8211; how can I delete cookies?</h3>
                    <p>You decide for yourself how and whether you want to use cookies. Regardless of which service or
                        website the
                        cookies come from, you always have the option of deleting cookies, deactivating them or only
                        partially
                        allowing them. For example, you can block third-party cookies but allow all other cookies.</p>
                    <p>If you would like to find out which cookies have been stored in your browser, if you want to
                        change or
                        delete cookie settings, you can do this in your browser settings:</p>
                    <p>
                        <a class="adsimple-312701248"
                            href="https://support.google.com/chrome/answer/95647?tid=312701248" target="_blank"
                            rel="noopener noreferrer">Chrome: Clear cookies in Chrome , activate and manage</a>
                    </p>
                    <p>
                        <a class="adsimple-312701248"
                            href="https://support.apple.com/de-at/guide/safari/sfri11471/mac?tid=312701248"
                            target="_blank" rel="noopener noreferrer"> Safari: Managing cookies and site data with
                            Safari</a>
                    </p>
                    <p>
                        <a class="adsimple-312701248"
                            href="https://support.mozilla.org/de/kb/cookies-und-website-daten-in-firefox-loschen?tid=312701248"
                            target="_blank" rel="noopener noreferrer">Firefox: Delete cookies to remove data that
                            websites have placed
                            on your computer</a>
                    </p>
                    <p>
                        <a class="adsimple-312701248"
                            href="https://support.microsoft.com/de-de/windows/l%C3%B6schen-und-verwalten-von-cookies-168dab11-0753-043d-7c16- ede5947fc64d?tid=312701248">Internet
                            Explorer: Deleting and managing cookies</a>
                    </p>
                    <p>
                        <a class="adsimple-312701248"
                            href="https://support.microsoft.com/de-de/microsoft-edge/cookies-in-microsoft-edge-l%C3%B6schen-63947406-40ac-c3b8- 57b9-2a946a29ae09?tid=312701248">Microsoft
                            Edge: Deleting and managing cookies</a>
                    </p>
                    <p>If you generally do not want cookies, you can set your browser so that it always informs you when
                        a cookie
                        is to be set. This means you can decide for each individual cookie whether you allow the cookie
                        or not. The
                        procedure varies depending on the browser. The best thing to do is to search for the
                        instructions in Google
                        using the search term “Delete cookies Chrome” or “Deactivate cookies Chrome” in the case of a
                        Chrome
                        browser.</p>
                    <h3 class="adsimple-312701248">Legal basis</h3>
                    <p>The so-called “cookie guidelines” have existed since 2009. This states that the storage of
                        cookies requires
                        your consent (Article 6 (1) (a) GDPR). However, there are still very different reactions to
                        these guidelines
                        within the EU countries. In Austria, however, this directive was implemented in Section 96
                        Paragraph 3 of
                        the Telecommunications Act (TKG). In Germany, the cookie guidelines have not been implemented as
                        national
                        law. Instead, this directive was largely implemented in Section 15 Paragraph 3 of the Telemedia
                        Act (TMG).
                    </p>
                    <p>For absolutely necessary cookies, even if no consent has been given, there are <strong
                            class="adsimple-312701248">legitimate interests</strong> (Article 6 Para. 1 lit. f GDPR),
                        which in most
                        cases are of an economic nature are. We want to provide visitors to the website with a pleasant
                        user
                        experience and certain cookies are often absolutely necessary for this.</p>
                    <p>If non-essential cookies are used, this will only happen with your consent. RThe legal basis in
                        this
                        respect is Article 6 Paragraph 1 Letter a GDPR.</p>
                    <p>In the following sections you will be informed in more detail about the use of cookies, if the
                        software
                        used uses cookies.</p>
                    <h2 id="customer data" class="adsimple-312701248">Customer data</h2>
                    <table border="1" cellpadding="15">
                        <tbody>
                            <tr>
                                <td>
                                    <strong class="adsimple-312701248">Customer Data Summary</strong>
                                    <br />
                                    &#x1f465; Affected: Customers or business and contractual partners<br />
                                    &#x1f91d; Purpose: Provision of the contractually or pre-contractually agreed
                                    services including
                                    associated communication<br />
                                    &#x1f4d3; Processed data: name, address, contact details, email address, telephone
                                    number, payment
                                    information (such as invoices and bank details), contract data (such as term and
                                    subject matter of the
                                    contract), IP address, order data<br />
                                    &#x1f4c5; Storage period: the data will be deleted as soon as it is no longer
                                    required to fulfill our
                                    business purposes and there is no legal obligation to retain it.<br />
                                    &#x2696;&#xfe0f; Legal basis: Legitimate interest (Art. 6 Para. 1 lit. f GDPR),
                                    contract (Art. 6 Para.
                                    1 lit. b GDPR)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="adsimple-312701248">What is customer data?</h3>
                    <p>So that we can offer our service and our contractual services, we also process data from our
                        customers and
                        business partners. This data always includes personal data. Customer data refers to all
                        information that is
                        processed on the basis of a contractual or pre-contractual collaboration in order to be able to
                        provide the
                        services offered. Customer data is all collected information that we collect and process about
                        our
                        customers.</p>
                    <h3 class="adsimple-312701248">Why do we process customer data?</h3>
                    <p>There are many reasons why we collect and process customer data. The most important one is that
                        we simply
                        need various data to provide our services. Sometimes your email address is enough, but if you
                        purchase a
                        product or service, we also need data such as name, address, bank details or contract details.
                        We also use
                        the data for marketing and sales optimization so that we can improve our overall service for our
                        customers.
                        Another important point is our customer service, which is always very important to us. We want
                        you to be
                        able to come to us at any time with questions about our offers and for this we need at least
                        your email
                        address.</p>
                    <h3 class="adsimple-312701248">What data is processed?</h3>
                    <p>Exactly which data is stored can only be shown at this point based on categories. This always
                        depends on
                        which services you receive from us. In some cases, you simply give us your email address so that
                        we can, for
                        example, contact you or answer your questions. In other cases, you purchase a product or service
                        from us and
                        for this we need significantly more information, such as your contact details, payment details
                        and contract
                        details.</p>
                    <p>Here is a list of possible data that we receive and process from you:</p>
                    <ul class="adsimple-312701248">
                        <li class="adsimple-312701248">Name</li>
                        <li class="adsimple-312701248">Contact address</li>
                        <li class="adsimple-312701248">Email address</li>
                        <li class="adsimple-312701248">Phone number</li>
                        <li class="adsimple-312701248">Date of birth</li>
                        <li class="adsimple-312701248">Payment data (invoices, bank details, payment history, etc.)</li>
                        <li class="adsimple-312701248">Contract data (term, content)</li>
                        <li class="adsimple-312701248">Usage data (websites visited, access data, etc.)</li>
                        <li class="adsimple-312701248">Metadata (IP address, device information)</li>
                    </ul>
                    <h3 class="adsimple-312701248">How long is the data stored?</h3>
                    <p>As soon as we no longer need the customer data to fulfill our contractual obligations and our
                        purposes and
                        the data is no longer necessary for possible warranty and liability obligations, we delete the
                        corresponding
                        customer data. This is the case, for example, when a business contract ends. After that, the
                        limitation
                        period is usually 3 years, although longer periods are possible in individual cases. Of course,
                        we also
                        adhere to the legal retention requirements. Your customer data will definitely not be passed on
                        to third
                        parties unless you have explicitly given your consent.</p>
                    <h3 class="adsimple-312701248">Legal basis</h3>
                    <p>The legal basis for the processing of your data is Art. 6 Para. 1 lit. a GDPR (consent), Art. 6
                        Para. 1
                        lit. b GDPR (contract or pre-contractual measures), Art. 6 Para. 1 lit. f GDPR (legitimate
                        interests) and in
                        special cases (e.g. medical services) Art. 9 Para. 2 lit. a. GDPRO (Special Category
                        Processing).</p>
                    <p>In the event of protecting vital interests, data processing takes place in accordance with
                        Article 9
                        Paragraph 2 Letter c. GDPR. For the purposes of health care, occupational medicine, medical
                        diagnostics,
                        care or treatment in the health or social sector or for the administration of systems and
                        services in the
                        health or social sector, personal data is processed in accordance with Art. 9 Para. 2 lit. H.
                        GDPR. If you
                        voluntarily provide data in the special categories, the processing will take place on the basis
                        of Article 9
                        Paragraph 2 Letter a. GDPR.</p>
                    <h2 id="registration" class="adsimple-312701248">Registration</h2>
                    <table border="1" cellpadding="15">
                        <tbody>
                            <tr>
                                <td>
                                    <strong class="adsimple-312701248">Registration Summary</strong>
                                    <br />
                                    &#x1f465; Affected: <span class="adsimple-312701248" style="font-weight: 400">All
                                        people who register,
                                        create an account, log in and use the account.<br />
                                        &#x1f4d3; Processed data: email address, name, password and other data collected
                                        during
                                        registration, login and account use.<br />
                                    </span>&#x1f91d; Purpose: <span class="adsimple-312701248"
                                        style="font-weight: 400">Providing our
                                        services. Communication with customers in connection with the services.</span>
                                    <br />
                                    &#x1f4c5; Storage period: S<span class="adsimple-312701248"
                                        style="font-weight: 400">as long as the
                                        company account associated with the texts exists and then usually 3 years.<br />
                                    </span>&#x2696;&#xfe0f; Legal basis: Art. 6 Para. 1 lit. b GDPR (contract), Art. 6
                                    Para. 1 lit. a GDPR
                                    (consent), Art. 6 Para. 1 lit. f GDPR (legitimate interests)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">If you register with us, personal data
                            may be
                            processed if you enter personal data or data such as the IP address recorded during
                            processing. You can
                            read below what we mean by the rather unwieldy term “personal data”.</span>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">Please only enter the data that we
                            need for
                            registration and for which you have the approval of a third party if you are registering on
                            behalf of a
                            third party carry out by third parties. If possible, use a strong password that you don't
                            use anywhere
                            else and an email address that you check regularly.</span>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">In the following we will inform you
                            about the
                            exact type of data processing, because we want you to feel comfortable with us!</span>
                    </p>
                    <h3 class="adsimple-312701248">What is registration?</h3>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">When you register, we collect certain
                            data from
                            you and enable you to later easily log in online and use your account with us. An account
                            with us has the
                            advantage that you don't have to re-enter everything every time. Saves time, effort and
                            ultimately
                            prevents errors in the delivery of our services.</span>
                    </p>
                    <h3 class="adsimple-312701248">Why do we process personal data?</h3>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">In short, we process personal data to
                            enable the
                            creation and use of an account with us.</span>
                        <span class="adsimple-312701248" style="font-weight: 400">
                            <br />
                        </span>
                        <span class="adsimple-312701248" style="font-weight: 400">If we didn't do this, you would have
                            to enter all
                            the data every time, wait for us to approve it and enter everything again. We and many, many
                            customers
                            wouldn't like that. How would you like that?</span>
                    </p>
                    <h3 class="adsimple-312701248">What data is processed?</h3>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">Enter all the data you provided during
                            registration when you log in or enter it as part of managing your data in the
                            account.</span>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">When registering, we process the
                            following types
                            of data: </span>
                    </p>
                    <ul class="adsimple-312701248">
                        <li class="adsimple-312701248" style="font-weight: 400">
                            <span class="adsimple-312701248" style="font-weight: 400">First name</span>
                        </li>
                        <li class="adsimple-312701248">Last Name</li>
                        <li class="adsimple-312701248" style="font-weight: 400">
                            <span class="adsimple-312701248" style="font-weight: 400">Email address</span>
                        </li>
                        <li class="adsimple-312701248">Company name</li>
                        <li class="adsimple-312701248">Street + house number</li>
                        <li class="adsimple-312701248" style="font-weight: 400">Residence</li>
                        <li class="adsimple-312701248">Postal code</li>
                        <li class="adsimple-312701248">Country</li>
                    </ul>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">When you register, we process the data
                            you enter
                            when registering, such as username and password, and data collected in the background such
                            as device
                            information and IP addresses.</span>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">When using your account, we process
                            data that you
                            enter while using your account and which is created as part of using our services.</span>
                    </p>
                    <h3 class="adsimple-312701248">Storage duration</h3>
                    <p>We store the data entered at least for as long as the account linked to the data exists and is
                        used with
                        us, as long as contractual obligations exist between us and, when the contract ends, until the
                        respective
                        claims arising from it have expired. In addition, we store your data as long as and to the
                        extent that we
                        are subject to legal storage obligations. We then retain booking documents associated with the
                        contract
                        (invoices, contract documents, bank statements, etc.) as well as other relevant business
                        documents for the
                        legally required period (usually a few years).</p>
                    <h3 class="adsimple-312701248">Right to object</h3>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">You have registered, entered data and
                            would like
                            to revoke the processing? No problem. As you can read above, the rights under the General
                            Data Protection
                            Regulation also apply during and after registration, login or account with us. Contact the
                            person
                            responsible for data protection above to exercise your rights. If you already have an
                            account with us, you
                            can easily view and manage your data and texts in the account.</span>
                    </p>
                    <h3 class="adsimple-312701248">Legal basis</h3>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">By completing the registration
                            process, you are
                            approaching us pre-contractually to conclude a usage agreement for our platform (even if a
                            payment
                            obligation does not automatically arise). You invest time to enter data and register and we
                            offer you our
                            services after logging into our system and viewing your customer account. We also fulfill
                            our contractual
                            obligations. Finally, we need to keep registered users informed of important changes via
                            email. This means
                            that Art. 6 Para. 1 lit. b GDPR (implementation of pre-contractual measures, fulfillment of
                            a contract)
                            applies.
                    </p>
                    <p>If necessary, we will also obtain your consent, e.g. if you voluntarily provide more data than is
                        absolutely necessary or if we are allowed to send you advertising. Art. 6 Para. 1 lit. a GDPR
                        (consent)
                        therefore applies.</p>
                    <p>We also have a legitimate interest in knowing who we are dealing with in order to contact you in
                        certain
                        cases. We also need to know who is using our services and whether they are being used in the way
                        our terms
                        of use stipulate, i.e. Art. 6 Para. 1 lit. f GDPR (legitimate interests) applies.</p>
                    <p>Note: Users should check the following sections (as required):</p>
                    <p>
                        <strong class="adsimple-312701248">Register with real name</strong>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">Since we need to know who we are
                            dealing with in
                            business operations, registration is only possible with your real name (real name) and not
                            with
                            Pseudonyms.</span>
                    </p>
                    <p>
                        <strong class="adsimple-312701248">Registration with pseudonyms</strong>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">Pseudonyms can be used during
                            registration, which
                            means you do not have to register with us using your real name. This ensures that your name
                            cannot be
                            processed by us. </span>
                    </p>
                    <p>
                        <strong class="adsimple-312701248">Storage of the IP address</strong>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">During registration, login and account
                            use, we
                            store the IP address in the background for security reasons in order to be able to determine
                            legitimate
                            use.</span>
                    </p>
                    <p>
                        <strong class="adsimple-312701248">Public Profile</strong>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">The user profiles are publicly
                            visible, i.e. you
                            can see parts of the profile on the Internet without specifying your username and
                            password.</span>
                    </p>
                    <p>
                        <strong class="adsimple-312701248">2-factor authentication (2FA)</strong>
                    </p>
                    <p>
                        <span class="adsimple-312701248" style="font-weight: 400">Two-factor authentication (2FA) offers
                            additional
                            security when logging in, as it prevents you from logging in without a smartphone, for
                            example. This
                            technical measure to secure your account protects you from the loss of data or unauthorized
                            access, even
                            if your user name and password are knownwould be. </span>
                        <span class="adsimple-312701248" style="font-weight: 400">You can find out which 2FA is used
                            when
                            registering, logging in and in the account itself.</span>
                    </p>
                    <h2 id="webdesign-einleitung" class="adsimple-312701248">Web design introduction</h2>
                    <table border="1" cellpadding="15">
                        <tbody>
                            <tr>
                                <td>
                                    <strong class="adsimple-312701248">Web Design Privacy Policy Summary</strong>
                                    <br />
                                    &#x1f465; Affected: Visitors to the website<br />
                                    &#x1f91d; Purpose: Improve user experience<br />
                                    &#x1f4d3; Data processed: Which data is processed depends largely on the services
                                    used. This usually
                                    involves IP address, technical data, language settings, browser version, screen
                                    resolution and name of
                                    the browser. You can find more details about the web design tools used.<br />
                                    &#x1f4c5; Storage duration: depends on the tools used<br />
                                    &#x2696;&#xfe0f; Legal basis: Art. 6 Para. 1 lit. a GDPR (consent), Art. 6 Para. 1
                                    lit. f GDPR
                                    (legitimate interests)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="adsimple-312701248">What is web design?</h3>
                    <p>We use various tools on our website that serve our web design. Web design is not, as is often
                        assumed, just
                        about making our website look pretty, but also about functionality and performance. But of
                        course the right
                        look of a website is also one of the major goals of professional web design. Web design is a
                        sub-area of
                        media design and deals with the visual as well as the structural and functional design of a
                        website. The aim
                        is to use web design to improve your experience on our website. In web design jargon, this is
                        referred to as
                        user experience (UX) and usability. User experience refers to all the impressions and
                        experiences that
                        website visitors experience on a website. A sub-point of the user experience is usability. This
                        is about the
                        user-friendliness of a website. The main emphasis here is on ensuring that content, subpages or
                        products are
                        clearly structured and that you can find what you are looking for easily and quickly. In order
                        to offer you
                        the best possible experience on our website, we also use so-called third-party web design tools.
                        In this
                        data protection declaration, the “web design” category includes all services that improve the
                        design of our
                        website. These can be, for example, fonts, various plugins or other integrated web design
                        functions.</p>
                    <h3 class="adsimple-312701248">Why do we use web design tools?</h3>
                    <p>How you absorb information on a website depends very much on the structure, functionality and
                        visual
                        perception of the website. Therefore, good and professional web design became more and more
                        important for
                        us. We are constantly working on improving our website and see this as an extended service for
                        you as a
                        website visitor. Furthermore, a beautiful and functioning website also has economic advantages
                        for us. After
                        all, you will only visit us and take advantage of our offers if you feel completely comfortable.
                    </p>
                    <h3 class="adsimple-312701248">What data are stored by web design tools?</h3>
                    <p>When you visit our website, web design elements may be integrated into our pages, which can also
                        process
                        data. Exactly what data is involved, of course, depends heavily on the tools used. Below you can
                        see exactly
                        which tools we use for our website. We recommend that you read the respective data protection
                        declaration of
                        the tools used for more information about data processing. You will usually find out what data
                        is being
                        processed, whether cookies are being used and how long the data is being kept. Fonts such as
                        Google Fonts
                        also automatically transmit information such as language settings, IP address, browser version,
                        browser
                        screen resolution and browser name to the Google servers.</p>
                    <h3 class="adsimple-312701248">Duration of data processing</h3>
                    <p>How long data is processed is very individual and depends on the web design elements used. For
                        example, if
                        cookies are used, the retention period can last as little as a minute or as long as a few years.
                        Please be
                        smart about this. On the one hand, we recommend our general text section on cookies and the data
                        protection
                        declarations of the tools used. There you can usually find out exactly which cookies are used
                        and what
                        information is stored in them. For example, Google Font files are stored for one year. This is
                        intended to
                        improve the loading time of a website. In principle, data is only retained for as long as is
                        necessary to
                        provide the service. AtDue to legal requirements, data can also be stored for longer periods.
                    </p>
                    <h3 class="adsimple-312701248">Right to object</h3>
                    <p>You also have the right and the opportunity to revoke your consent to the use of cookies or
                        third-party
                        providers at any time. This works either via our cookie management tool or via other opt-out
                        functions. You
                        can also prevent data collection through cookies by managing, deactivating or deleting cookies
                        in your
                        browser. However, there is also data among web design elements (mostly fonts) that cannot be
                        deleted so
                        easily. This is the case when data is automatically collected directly when a page is accessed
                        and
                        transmitted to a third-party provider (such as Google). Then please contact the support of the
                        relevant
                        provider. In the case of Google, you can reach support at <a class="adsimple-312701248"
                            href="https://support.google.com/?hl=de">https://support.google.com/?hl= en</a>.</p>
                    <h3 class="adsimple-312701248">Legal basis</h3>
                    <p>If you have consented to the use of web design tools, the legal basis for the corresponding data
                        processing
                        is this consent. According to Art. 6 Para. 1 lit. a GDPR (consent), this consent represents the
                        legal basis
                        for the processing of personal data, as may occur when it is collected by web design tools. We
                        also have a
                        legitimate interest in web design to improve our website. After all, only then can we provide
                        you with a
                        beautiful and professional website. The corresponding legal basis for this is Article 6
                        Paragraph 1 Letter f
                        GDPR (legitimate interests). However, we only use web design tools if you have given your
                        consent. We
                        definitely want to emphasize this again here.</p>
                    <p>You can get information about special web design tools &#8211; if available &#8211; in the
                        following
                        sections.</p>
                    <h2 id="google-fonts-datenschutzerklaerung" class="adsimple-312701248">Google Fonts privacy policy
                    </h2>
                    <table border="1" cellpadding="15">
                        <tbody>
                            <tr>
                                <td>
                                    <strong class="adsimple-312701248">Google Fonts Privacy Policy Summary</strong>
                                    <br />
                                    &#x1f465; Affected: Visitors to the website<br />
                                    &#x1f91d; Purpose: Optimization of our service<br />
                                    &#x1f4d3; Data processed: Data such as IP address and CSS and font requests<br />
                                    You can find more details about this further down in this data protection
                                    declaration.<br />
                                    &#x1f4c5; Storage period: Font files are stored by Google for one year<br />
                                    &#x2696;&#xfe0f; Legal basis: Art. 6 Para. 1 lit. a GDPR (consent), Art. 6 Para. 1
                                    lit. f GDPR
                                    (legitimate interests)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="adsimple-312701248">What are Google Fonts?</h3>
                    <p>We use Google Fonts on our website. These are the &#8220;Google Fonts&#8221; of Google Inc. For
                        the
                        European region, Google Ireland Limited (Gordon House, Barrow Street Dublin 4, Ireland) is
                        responsible for
                        all Google services.</p>
                    <p>You do not need to register or provide a password to use Google fonts. Furthermore, no cookies
                        are stored
                        in your browser. The files (CSS, fonts/fonts) are requested via the Google domains
                        fonts.googleapis.com and
                        fonts.gstatic.com. According to Google, requests for CSS and fonts are completely separate from
                        all other
                        Google services. If you have a Google Account, you do not need to worry that your Google Account
                        information
                        will be transmitted to Google while using Google Fonts. Google records the use of CSS (Cascading
                        Style
                        Sheets) and the fonts used and stores this data securely. We will take a closer look at what
                        data storage
                        looks like.</p>
                    <p>Google Fonts (formerly Google Web Fonts) is a directory with over 800 fonts that <a
                            class="adsimple-312701248"
                            href="https://de.wikipedia.org/wiki/Google_LLC?tid=312701248">Google</a> make
                        available to your users for free.</p>
                    <p>Many of these fonts are released under the SIL Open Font License, while others are released under
                        the
                        Apache License. Both are free software licenses.</p>
                    <h3 class="adsimple-312701248">Why do we use Google Fonts on our website?</h3>
                    <p>With Google Fonts we can use fonts on our own website and don't have to upload them to our own
                        server.
                        Google Fonts is an important component in keeping the quality of our website high. All Google
                        fonts are
                        automatically optimized for the web and this saves data volume and is a big advantage,
                        especially for use on
                        mobile devices. When you visit our site, the low file size ensures a fast loading time.
                        Furthermore, Google
                        Fonts are secure web fonts. Different image synthshese systems (rendering) in different
                        browsers, operating
                        systems and mobile devices can lead to errors. Such errors can visually distort some texts or
                        entire
                        websites. Thanks to the fast Content Delivery Network (CDN), there are no cross-platform issues
                        with Google
                        Fonts. Google Fonts supports all major browsers (Google Chrome, Mozilla Firefox, Apple
                        Safari, Opera) and
                        works reliably on most modern mobile operating systems, including Android 2.2+ and iOS 4.2+
                        (iPhone, iPad,
                        iPod). We use Google Fonts so that we can present our entire online service as beautifully and
                        consistently
                        as possible.</p>
                    <h3 class="adsimple-312701248">What data does Google store?</h3>
                    <p>When you visit our website, the fonts are downloaded via a Google server. Through this external
                        call, data
                        is transmitted to the Google servers. This is how Google also recognizes that you or your IP
                        address visits
                        our website. The Google Fonts API is designed to reduce the use, storage, and collection of
                        end-user data to
                        what is necessary for proper font delivery. By the way, API stands for “Application Programming
                        Interface”
                        and serves, among other things, as a data transmitter in the software sector.</p>
                    <p>Google Fonts stores CSS and font requests securely on Google and is therefore protected. By
                        collecting
                        usage figures, Google can determine how well the individual fonts are received. Google publishes
                        the results
                        on internal analysis sites, such as Google Analytics. Google also uses data from its own web
                        crawler to
                        determine which websites use Google fonts. This data is published in the Google Fonts BigQuery
                        database.
                        Entrepreneurs and developers use the Google web service BigQuery to examine and move large
                        amounts of data.
                    </p>
                    <p>However, it should also be remembered that every Google Font request also automatically transmits
                        information such as language settings, IP address, browser version, browser screen resolution
                        and browser
                        name to the Google servers. Whether this data is also stored cannot be clearly determined or is
                        not clearly
                        communicated by Google.</p>
                    <h3 class="adsimple-312701248">How long and where is the data stored?</h3>
                    <p>Google stores requests for CSS assets for one day on its servers, which are mainly located
                        outside the EU.
                        This allows us to use the fonts using a Google stylesheet. A style sheet is a format template
                        that you can
                        use to quickly and easily change the design or font of a website, for example.</p>
                    <p>The font files are stored by Google for one year. Google's goal is to fundamentally improve the
                        loading
                        time of websites. When millions of websites reference the same fonts, they are cached after the
                        first visit
                        and immediately appear on all other websites visited later. Sometimes Google updates font files
                        to reduce
                        file size, increase language coverage, and improve design.</p>
                    <h3 class="adsimple-312701248">How can I delete my data or prevent data storage?</h3>
                    <p>The data that Google stores for a day or a year cannot simply be deleted. The data is
                        automatically
                        transmitted to Google when the page is accessed. In order to delete this data early, you must
                        contact Google
                        Support at <a class="adsimple-312701248"
                            href="https://support.google.com/?hl=de&amp;tid=312701248">https:/
                            /support.google.com/?hl=de&amp;tid=312701248</a>. In this case, you can only prevent data
                        storage if you
                        do not visit our site.</p>
                    <p>Unlike other web fonts, Google allows us unlimited access to all fonts. So we have unlimited
                        access to a
                        sea of fonts and get the best for our website. You can find out more about Google Fonts and
                        other questions
                        at https://developers.google.com /fonts/faq?tid=312701248</a>. Although Google addresses data
                        protection-related matters there, it does not contain any really detailed information about data
                        storage. It
                        is relatively difficult to get really precise information about stored data from Google.</p>
                    <h3 class="adsimple-312701248">Legal basis</h3>
                    <p>If you have consented to the use of Google Fonts, the legal basis for the corresponding data
                        processing is
                        this consent. This consent represents the legal basis for the processing of personal data as
                        recorded by
                        Google fonts can occur.</p>
                    <p>We also have a legitimate interest in using Google Font to optimize our online service. The
                        corresponding
                        legal basis for this is Art. 6 para. 1 lit. f GDPR (legitimate interests).
                        However, we only use Google Font if you have given your consent.</p>
                    <p>Google also processes your data in the USA, among other places. Google is an active participant
                        in the
                        EU-US Data Privacy Framework, which regulates the correct and secure transfer of personal data
                        from EU
                        citizens to the USA. You can find more information about this at <a class="adsimple-312701248"
                            href="https://commission.europa.eu/document/fa09cbad-dd7d-4684-ae60-be03fcb0fddf_en"
                            target="_blank" rel="follow noopener ">
                            https://commission.europa.eu/document/fa09cbad-dd7d-4684-ae60-be03fcb0fddf_en</a>.
                    </p>
                    <p>In addition, Google uses so-called standard contractual clauses (= Art. 46 Paragraphs 2 and 3
                        GDPR).
                        Standard Contractual Clauses (SCC) are templates provided by the EU Commission and are intended
                        to ensure
                        that your data complies with European data protection standards even if it is transferred to
                        third countries
                        (such as the USA) and stored there. Through the EU-US Data Privacy Framework and the Standard
                        Contractual
                        Clauses, Google undertakes to comply with the European level of data protection when processing
                        your
                        relevant data, even if the data is stored, processed and managed in the USA. These clauses are
                        based on an
                        implementing decision of the EU Commission. You can find the resolution and the corresponding
                        standard
                        contractual clauses here: <a class="adsimple-312701248"
                            href="https://eur-lex.europa.eu/eli/dec_impl/2021/914/oj?locale=de" target="_blank"
                            rel="follow noopener">https://eur-lex.europa.eu/eli/dec_impl/2021/914/oj?locale=de</a>
                    </p>
                    <p>The Google Ads Data Processing Terms, which refer to the standard contractual clauses, can be
                        found at <a class="adsimple-312701248"
                            href="https://business.safety.google/intl/de/ adsprocessorterms/" target="_blank"
                            rel="follow noopener">https://business.safety.google/intl/de/adsprocessorterms/</a>.</p>
                    <p>You can also find out which data is generally collected by Google and what this data is used for
                        at <a class="adsimple-312701248"
                            href="https://policies.google.com/privacy?hl=de&amp;tid =312701248">Read
                            https://www.google.com/intl/de/policies/privacy/</a>.</p>
                    <h2 id="google-fonts-local-data protection declaration" class="adsimple-312701248">Google Fonts
                        Local data
                        protection declaration</h2>
                    <p>On our website we use Google Fonts from Google Inc. The company Google Ireland Limited (Gordon
                        House,
                        Barrow Street Dublin 4, Ireland) is responsible for Europe. We have the Google fonts locally,
                        i.e. on our
                        web server &#8211; not on Google's servers &#8211; integrated. This means there is no connection
                        to Google
                        servers and therefore no data transfer or storage.</p>
                    <h3 class="adsimple-312701248">What are Google Fonts?</h3>
                    <p>Google Fonts used to be called Google Web Fonts. This is an interactive directory with over 800
                        fonts that
                        <a class="adsimple-312701248"
                            href="https://de.wikipedia.org/wiki/Google_LLC?tid=312701248">Google</a>
                        provided free of charge. With Google Fonts you could use fonts without uploading them to your
                        own server.
                        However, in order to prevent any information transfer to Google servers, we have downloaded the
                        fonts to our
                        server. In this way, we act in accordance with data protection regulations and do not send any
                        data to
                        Google Fonts.
                    </p>
                    <h2 id="explanation of terms used" class="adsimple-312701248">Explanation of terms used</h2>
                    <p>We always strive to make our data protection declaration as clear and understandable as possible.
                        However,
                        this is not always easy, especially when it comes to technical and legal issues. It often makes
                        sense to use
                        legal terms (such as personal data) or certain technical terms (such as cookies, IP address).
                        But we don't
                        want to use them without explanation. Below you will find an alphabetical list of important
                        terms used that
                        we may not have addressed sufficiently in the previous data protection declaration. If these
                        terms were
                        taken from the GDPR and they are definitions, we will also cite the GDPR texts here and add our
                        own
                        explanations if necessary.</p>
                    <h2 id="final word" class="adsimple-312701248">Final word</h2>
                    <p>Congratulations! If you are reading these lines, you have actually “fought” your way through our
                        entire
                        privacy policy or at least scrolled this far. As you can see from the scope of ourSee privacy
                        policy, we
                        take the protection of your personal data anything but lightly.<br />
                        It is important to us to inform you to the best of our knowledge and belief about the processing
                        of personal
                        data. We not only want to tell you which data is processed, but also explain the reasons for
                        using various
                        software programs. As a rule, data protection declarations sound very technical and legal. Since
                        most of you
                        are not web developers or lawyers, we wanted to take a different linguistic approach and explain
                        the matter
                        in simple and clear language. Of course, this is not always possible due to the subject matter.
                        Therefore,
                        the most important terms are explained in more detail at the end of the data protection
                        declaration.<br />
                        If you have any questions about data protection on our website, please do not hesitate to
                        contact us or the
                        responsible body. We wish you a nice time and hope to welcome you back to our website soon.</p>
                    <p>All texts are protected by copyright.</p>
                </div>
                <div class="card-footer text-body-secondary">
                    <p style="margin-top:15px">Source: Created with the <a
                            href="https://www.adsimple.de/datenschutz-generator/"
                            title="Data Protection Generator from AdSimple for Germany">Data Protection Generator </a>
                        by AdSimple</p>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
    <footer>
        <span class="">
            <p>Links:</p>
            <span class="hstack gap-4 media-uvis">
                <p class="p-2"><a href="../about/">About</a></p>
                <p class="p-2"><a href="../legalnotice/">Legal Notice</a></p>
                <p class="p-2"><a href="../licence/">Licence</a></p>
                <p class="p-2"><a href="https://github.com/persolib/personalitylib.com">Github</a></p>
            </span>
            <span class="media-vis">
                <span class="hstack gap-2">
                    <p class=""><a href="../about/">About</a></p>
                    <p class=""><a href="../legalnotice/">Legal Notice</a></p>
                </span>
                <span class="hstack gap-2">
                    <p class=""><a href="../licence/">Licence</a></p>
                    <p class=""><a href="https://github.com/persolib/personalitylib.com">Github</a></p>
                </span>
            </span>
        </span>
        <span class="footer-span">
            <p>© 2024 PersonalityLib</p>
        </span>
    </footer>
</body>

</html>