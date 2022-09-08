<!-- Sidebar Menu -->
<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<?php
		static $table1  = 'a_mn';
		static $table2  = 'a_mn_grp';
		$this->db->join('a_mn_grp', 'a_mn_id=a_mn_grp_menu', 'left');
		$this->db->where('a_mn_grp_lvl', $this->session->userdata('level'))
			->where('a_mn_grp_sts', 1)
			->where('a_mn_parentId = 0');
		$main_menu  = $this->db->get('a_mn');
		?>
		<?php foreach ($main_menu->result() as $main) : ?>
			<?php
			$this->db->join('a_mn_grp', 'a_mn_id=a_mn_grp_menu', 'left');
			$this->db->where('a_mn_parentId', $main->a_mn_id)
				->where('a_mn_grp_lvl', $this->session->userdata('level'))
				->where('a_mn_grp_sts', 1);
			$sub_menu  = $this->db->get('a_mn');
			?>


			<?php if ($sub_menu->num_rows() > 0) : ?>
				<li class="nav-item <?= $this->uri->segment(1) == $main->a_mn_name ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link <?= $this->uri->segment(1) == $main->a_mn_name ? 'active' : '' ?>">
						<i class="nav-icon <?= $main->a_mn_icon; ?>"></i>
						<p>
							<?= $main->a_mn_name; ?>
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<?php foreach ($sub_menu->result() as $sub) : ?>
								<a href="<?= site_url($sub->a_mn_link) ?>" class="<?= $this->uri->segment(2) == $sub->a_mn_name ? 'nav-link active' : 'nav-link' ?>">
									<i class="far fa-circle nav-icon"></i>
									<p><?= $sub->a_mn_name; ?></p>
								</a>
							<?php endforeach; ?>
						</li>
					</ul>
				</li>
			<?php else : ?>
				<li class="nav-item">
					<a class="nav-link <?= $this->uri->segment(1) == $main->a_mn_link ? 'active' : '' ?>" href="<?= site_url($main->a_mn_link); ?>">
						<i class="nav-icon fas fa-fw <?= $main->a_mn_icon; ?>"></i>
						<p><?= $main->a_mn_name; ?></p>
					</a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<script>
	$('.nav-link').on('click', function() {
		$('.nav-link').removeClass('active');
		$(this).addClass('active');
	});
</script>