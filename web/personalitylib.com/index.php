<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <script src="public/bootstrap/bootstrap.bundle.js"></script>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="public/favicon.ico" />
    <title>PersonalityLib</title>
    <meta name="title" content="PersonalityLib" />
    <link rel="stylesheet" href="public/css/style.css" />
    <!--Google Ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4168649657374641"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="hstack gap-2">
        <h1 class="titel p-2">
            <a href="https://personalitylib.com/">PersonalityLib</a>
            <span class="badge p-2 text-bg-light">BETA</span>
        </h1>
        <div class="link-tree p-2 ms-auto">
            <button type="button" class="btn btn-outline-primary active home"
                onclick="window.location.href='https://personalitylib.com/'">
                Home
            </button>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#betaModal">
                    LogIn
                </button>
                <button type="button" class="btn btn-outline-primary create" data-bs-toggle="modal"
                    data-bs-target="#betaModal">
                    Create
                </button>
                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='./about'">
                    About
                </button>
            </div>
        </div>
    </header>
    <main>
        <div class="input-div">
            <nav class="navbar bg-body-tertiary">
                <form class="container-fluid">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">#</span>
                        <input type="text" class="form-control" placeholder="PersoTag" aria-label="PeroTag"
                            aria-describedby="basic-addon1" />
                    </div>
                </form>
            </nav>
        </div>
        <div class="submit-div">
            <div class="button-submit-div">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#betaModal">
                        Search
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#betaModal">
                        Help
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="betaModal" tabindex="-1" aria-labelledby="betaModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="betaModalLabel">
                                    Open Beta
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                This website is still under construction and is in an open
                                beta
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <span>
            <p>Links:</p>
            <span class="hstack gap-4 media-uvis">
                <p class="p-2"><a href="about/">About</a></p>
                <p class="p-2"><a href="legalnotice/">Legal Notice</a></p>
                <p class="p-2"><a href="licence/">Licence</a></p>
                <p class="p-2">
                    <a href="https://github.com/persolib/personalitylib.com">Github</a>
                </p>
            </span>
            <span class="media-vis">
                <span class="hstack gap-2">
                    <p class=""><a href="about/">About</a></p>
                    <p class=""><a href="legalnotice/">Legal Notice</a></p>
                </span>
                <span class="hstack gap-2">
                    <p class=""><a href="licence/">Licence</a></p>
                    <p class="">
                        <a href="https://github.com/persolib/personalitylib.com">Github</a>
                    </p>
                </span>
            </span>
        </span>
        <h1>by JustWait</h1>
        <span class="footer-span">
            <p>© 2024 PersonalityLib</p>
        </span>
    </footer>
</body>

</html>