<style>
    .header {
        width: 100%;
        height: 48px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        background-color: #eeeeee;
    }

    .header__title {
        font-size: 1.6rem;
    }

    .header__menu {
        display: flex;
        gap: 1rem;
    }

    .header__menu a {
        font-weight: 600;
        transition: 0.3s;
    }

    .header__menu a:hover {
        color: #0071bc;
    }
</style>

<header class="header">
    <h1 class="header__title">{{ $page_title }}</h1>
    <div class="header__menu">
        <a href="/admin/">トップ</a>
        <a href="/admin/logout">ログアウト</a>
    </div>
</header>
