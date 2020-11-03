<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?page=home">Colegiu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?php echo isset($GLOBALS["current_route"]) && $GLOBALS["current_route"]["name"] == "home" ? "active" : ""; ?>">
                <a class="nav-link" href="?page=home">Home</a>
            </li>
            <li class="nav-item <?php echo isset($GLOBALS["current_route"]) && $GLOBALS["current_route"]["name"] == "elevi" ? "active" : ""; ?>">
                <a class="nav-link" href="?page=elevi">Elevi</a>
            </li>
        </ul>
    </div>
</nav>