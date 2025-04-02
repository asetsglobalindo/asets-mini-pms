<flux:sidebar sticky stashable
    class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
    <flux:brand href="#" logo="https://asets.co.id/assets/img/logo-asets.png" class="px-2 dark:hidden" />
    <flux:brand href="#" logo="https://asets.co.id/assets/img/footer/logo-aset-putih-footer.png"
        class="px-2 hidden dark:flex" />
    <flux:navlist variant="solid">
        <flux:navlist.item icon="home" href="/">DASHBOARD</flux:navlist.item>

        @php
            // Menentukan variabel izin sesuai dengan nama yang Anda berikan
            $permissions = [
                'account' => auth()->user()->can('account'),
                'bisnis' => auth()->user()->can('bisnis'),
                'bisnis_status' => auth()->user()->can('bisnis_status'),
                'daftar_listing' => auth()->user()->can('daftar_listing'),
                'document' => auth()->user()->can('document'),
                'fasilitas_listing' => auth()->user()->can('fasilitas_listing'),
                'fasilitas_umum' => auth()->user()->can('fasilitas_umum'),
                'invoice' => auth()->user()->can('invoice'),
                'item' => auth()->user()->can('item'),
                'jenis_ruangan' => auth()->user()->can('jenis_ruangan'),
                'kategori_bisnis' => auth()->user()->can('kategori_bisnis'),
                'pendapatan_listing' => auth()->user()->can('pendapatan_listing'),
                'pendapatan_total' => auth()->user()->can('pendapatan_total'),
                'permission' => auth()->user()->can('permission'),
                'role' => auth()->user()->can('role'),
                'tenant' => auth()->user()->can('tenant'),
            ];
        @endphp

        {{-- GROUP: INVENTORY --}}
        @php
            $inventoryVisible =
                $permissions['daftar_listing'] ||
                $permissions['fasilitas_listing'] ||
                $permissions['fasilitas_umum'] ||
                $permissions['jenis_ruangan'];
        @endphp
        @if ($inventoryVisible)
            <flux:navlist.group expandable heading="INVENTORY" class="hidden lg:grid">
                @if ($permissions['daftar_listing'])
                    <flux:navlist.item icon="clipboard-document-list" href="/listing">Daftar Listing
                    </flux:navlist.item>
                @endif
                @if ($permissions['fasilitas_listing'])
                    <flux:navlist.item icon="wrench" href="/fasilitas-listing">Fasilitas Listing
                    </flux:navlist.item>
                @endif
                @if ($permissions['fasilitas_umum'])
                    <flux:navlist.item icon="building-office" href="/fasilitas-umum">Fasilitas Umum
                    </flux:navlist.item>
                @endif
                @if ($permissions['jenis_ruangan'])
                    <flux:navlist.item icon="rectangle-group" href="/jenis-ruangan">Jenis Ruangan
                    </flux:navlist.item>
                @endif
            </flux:navlist.group>
        @endif

        {{-- GROUP: MANAJEMEN BISNIS --}}
        @php
            $businessManagementVisible =
                $permissions['kategori_bisnis'] ||
                $permissions['tenant'] ||
                $permissions['bisnis'] ||
                $permissions['bisnis_status'] ||
                $permissions['item'];
        @endphp
        @if ($businessManagementVisible)
            <flux:navlist.group expandable heading="MANAJEMEN BISNIS" class="hidden lg:grid">
                @if ($permissions['kategori_bisnis'])
                    <flux:navlist.item icon="briefcase" href="/kategori-bisnis">Kategori Bisnis</flux:navlist.item>
                @endif
                @if ($permissions['tenant'])
                    <flux:navlist.item icon="user-group" href="/tenant">Tenant</flux:navlist.item>
                @endif
                @if ($permissions['bisnis'])
                    <flux:navlist.item icon="building-storefront" href="/bisnis">Bisnis</flux:navlist.item>
                @endif
                @if ($permissions['bisnis_status'])
                    <flux:navlist.item icon="check-badge" href="/bisnis-status">Bisnis Status</flux:navlist.item>
                @endif
                @if ($permissions['item'])
                    <flux:navlist.item icon="cube" href="/item">Item</flux:navlist.item>
                @endif
            </flux:navlist.group>
        @endif

        {{-- GROUP: LAPORAN --}}
        @php
            $reportVisible = $permissions['pendapatan_total'] || $permissions['pendapatan_listing'];
        @endphp
        @if ($reportVisible)
            <flux:navlist.group expandable heading="LAPORAN" class="hidden lg:grid">
                @if ($permissions['pendapatan_total'])
                    <flux:navlist.item icon="currency-dollar" href="/pendapatan-total">Pendapatan Total
                    </flux:navlist.item>
                @endif
                @if ($permissions['pendapatan_listing'])
                    <flux:navlist.item icon="chart-bar" href="/pendapatan-listing">Pendapatan Listing
                    </flux:navlist.item>
                @endif
            </flux:navlist.group>
        @endif

        {{-- GROUP: SETTING --}}
        @php
            $settingsVisible = $permissions['account'] || $permissions['role'] || $permissions['permission'];
        @endphp
        @if ($settingsVisible)
            <flux:navlist.group expandable heading="SETTING" class="hidden lg:grid">
                @if ($permissions['account'])
                    <flux:navlist.item icon="user-circle" href="/account">Account</flux:navlist.item>
                @endif
                @if ($permissions['role'])
                    <flux:navlist.item icon="key" href="/role">Role</flux:navlist.item>
                @endif
                @if ($permissions['permission'])
                    <flux:navlist.item icon="shield-check" href="/permission">Permission</flux:navlist.item>
                @endif
            </flux:navlist.group>
        @endif

    </flux:navlist>
    <flux:spacer />
    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:profile
            avatar="https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA0L3BmLWljb240LWppcjIwNjItcG9yLWwtam9iNzg4LnBuZw.png"
            name="User Demo" />
        <flux:menu>
            {{-- <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item> --}}

            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <flux:menu.item icon="arrow-right-start-on-rectangle" type="submit">
                    Logout
                </flux:menu.item>
            </form>

        </flux:menu>
    </flux:dropdown>
</flux:sidebar>
