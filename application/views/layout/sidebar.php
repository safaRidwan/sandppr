<ul class="menu-inner py-1">
                        <!-- Dashboard -->
                        <?php $menu = $this->uri->segment(2); ?>
                        <li class="menu-item  <?php if($menu=='home'){ echo "active"; } ?>">
                            <a href="<?= site_url('admin/home') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Dashboard</div>
                            </a>
                        </li>
                        <li class="menu-item  <?php if($menu=='konfigurasi'){ echo "active"; } ?>">
                                <a href="<?= site_url('admin/konfigurasi') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-message-square-edit"></i>
                                    <div data-i18n="Analytics">Konfigurasi</div>
                                </a>
                            </li>
                        <li class="menu-item  <?php if($menu=='caraousel'){ echo "active"; } ?>">
                            <a href="<?= site_url('admin/caraousel') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-copy"></i>
                                <div data-i18n="Analytics">Caraousel</div>
                            </a>
                        </li>
                            
                        <li class="menu-item  <?php if($menu=='kategori'){ echo "active"; } ?>">
                            <a href="<?= site_url('admin/kategori') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-category"></i>
                                <div data-i18n="Analytics">Kategori</div>
                            </a>
                        </li>

                        <li class="menu-item  <?php if($menu=='konten'){ echo "active open"; }
                            elseif($menu=='about'){ echo "active open"; }?>">
                            
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-layout"></i>
                                <div data-i18n="Layouts">Konten</div>
                            </a>

                            <ul class="menu-sub">
                                <li class="menu-item <?php if($menu=='about'){ echo "active"; } ?>">
                                    <a href="<?= site_url('admin/about') ?>" class="menu-link">
                                        <div data-i18n="about">About</div>
                                    </a>
                                </li>
                                <li class="menu-item  <?php if($menu=='konten'){ echo "active"; } ?>">
                                    <a href="<?= site_url('admin/konten') ?>" class="menu-link">
                                        <div data-i18n="armada">Armada</div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php if($this->session->userdata('level')=='Admin') { ?>
                            
                            <li class="menu-item  <?php if($menu=='user'){ echo "active"; } ?>">
                                <a href="<?= site_url('admin/user') ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-support"></i>
                                    <div data-i18n="Analytics">User</div>
                                </a>
                            </li>

                        <?php } ?>
                    </ul>