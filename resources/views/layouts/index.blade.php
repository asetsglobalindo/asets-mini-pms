<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asets Mini PMS</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    @fluxAppearance
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable
        class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
        <flux:brand href="#" logo="https://asets.co.id/assets/img/logo-asets.png" class="px-2 dark:hidden" />
        <flux:brand href="#" logo="https://asets.co.id/assets/img/footer/logo-aset-putih-footer.png"
            class="px-2 hidden dark:flex" />
        <flux:navlist variant="solid">
            <flux:navlist.item icon="home" href="/">DASHBOARD</flux:navlist.item>

            <flux:navlist.group expandable heading="INVENTORY" class="hidden lg:grid">
                <flux:navlist.item icon="clipboard-document-list" href="/listing">Daftar Listing</flux:navlist.item>
                <flux:navlist.item icon="wrench" href="/fasilitas-listing">Fasilitas Listing</flux:navlist.item>
                <flux:navlist.item icon="building-office" href="/fasilitas-umum">Fasilitas Umum</flux:navlist.item>
                <flux:navlist.item icon="rectangle-group" href="/jenis-ruangan">Jenis Ruangan</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group expandable heading="MANAJEMEN BISNIS" class="hidden lg:grid">
                <flux:navlist.item icon="briefcase" href="/kategori-bisnis">Kategori Bisnis</flux:navlist.item>
                <flux:navlist.item icon="user-group" href="/tenant">Tenant</flux:navlist.item>
                <flux:navlist.item icon="check-badge" href="/bisnis-status">Bisnis Status</flux:navlist.item>
                <flux:navlist.item icon="cube" href="/item">Item</flux:navlist.item>
                <flux:navlist.item icon="building-storefront" href="/bisnis">Bisnis</flux:navlist.item>
                <flux:navlist.item icon="document-text" href="/invoice">Invoice</flux:navlist.item>
                <flux:navlist.item icon="folder" href="/document">Document</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group expandable heading="LAPORAN" class="hidden lg:grid">
                <flux:navlist.item icon="currency-dollar" href="/pendapatan-total">Pendapatan Total</flux:navlist.item>
                <flux:navlist.item icon="chart-bar" href="/pendapatan-listing">Pendapatan Listing</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group expandable heading="SETTING" class="hidden lg:grid">
                <flux:navlist.item icon="user-circle" href="/account">Account</flux:navlist.item>
                <flux:navlist.item icon="key" href="/role">Role</flux:navlist.item>
                <flux:navlist.item icon="shield-check" href="/permission">Permission</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
        <flux:spacer />
        <flux:dropdown position="top" align="start" class="max-lg:hidden">
            <flux:profile
                avatar="https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA0L3BmLWljb240LWppcjIwNjItcG9yLWwtam9iNzg4LnBuZw.png"
                name="User Demo" />
            <flux:menu>
                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:spacer />
        <flux:dropdown position="top" alignt="start">
            <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>
                <flux:menu.separator />
                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    @yield('content')

    @fluxScripts
</body>

</html>
