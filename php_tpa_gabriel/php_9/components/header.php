<div class="Header">
    <div class="Header__brand">
        header
    </div>
    <ul class="Header__links">
        <li>
            <a href="">Link unu</a>
        </li>
        <li>
            <a href="">Link doi</a>
        </li>
        <li>
            <a href="">Link trei</a>
        </li>
        <li>
            <a href="">Link patru</a>
        </li>
    </ul>
</div>

<style>
    .Header {
        display: flex;
        align-items: center;
        padding: 0.7rem 1rem;
        background-color: #808080;
    }

    .Header__brand {
        width: 17%;
        color: white;
        font-size: 2.6rem;
    }

    .Header__links {
        display: flex;
        align-items: stretch;
        list-style: none;
    }

    .Header__links li {
        padding: 0.8rem 2rem;
        text-align: center;
        border-left: 1px solid white;
        border-right: 1px solid white;
        background-color: #BDBEC4;
    }

    .Header__links li:first-child {
        border-left: none;
    }

    .Header__links li:last-child {
        border-right: none;
    }

    .Header__links li a {
        color: white;
        text-decoration: none;
    }
</style>