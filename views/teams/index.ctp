<?php
$this->Html->addCrumb (__('Teams', true));
$this->Html->addCrumb (__('List', true));
?>

<div class="teams index">
<h2><?php __('List Teams');?></h2>
<p><?php
__('Locate by letter: ');
$links = array();
foreach ($letters as $l) {
	$l = up($l[0]['letter']);
	$links[] = $this->Html->link($l, array('action' => 'letter', 'letter' => $l));
}
echo implode ('&nbsp;&nbsp;', $links);
?></p>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table class="list">
<tr>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('league_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($teams as $team):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->element('team/block', array('team' => $team['Team'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($team['League']['long_name'], array('controller' => 'leagues', 'action' => 'view', 'league' => $team['League']['id'])); ?>
		</td>
		<td class="actions">
			<?php
			echo $this->ZuluruHtml->iconLink('schedule_24.png',
				array('action' => 'schedule', 'team' => $team['Team']['id']),
				array('alt' => __('Schedule', true), 'title' => __('Schedule', true)));
			echo $this->ZuluruHtml->iconLink('standings_24.png',
				array('controller' => 'leagues', 'action' => 'standings', 'league' => $team['League']['id'], 'team' => $team['Team']['id']),
				array('alt' => __('Standings', true), 'title' => __('Standings', true)));
			if ($is_admin || in_array($team['Team']['id'], $this->Session->read('Zuluru.OwnedTeamIDs'))) {
				echo $this->ZuluruHtml->iconLink('edit_24.png',
					array('action' => 'edit', 'team' => $team['Team']['id']),
					array('alt' => __('Edit Team', true), 'title' => __('Edit Team', true)));
				echo $this->ZuluruHtml->iconLink('email_24.png',
					array('action' => 'emails', 'team' => $team['Team']['id']),
					array('alt' => __('Player Emails', true), 'title' => __('Player Emails', true)));
			}
			if ($is_admin || (in_array($team['Team']['id'], $this->Session->read('Zuluru.OwnedTeamIDs')) && $team['League']['roster_deadline'] >= date('Y-m-d'))) {
				echo $this->ZuluruHtml->iconLink('roster_add_24.png',
					array('action' => 'add_player', 'team' => $team['Team']['id']),
					array('alt' => __('Add Player', true), 'title' => __('Add Player', true)));
			}
			if ($is_admin) {
				echo $this->ZuluruHtml->iconLink('spirit_24.png',
					array('action' => 'spirit', 'team' => $team['Team']['id']),
					array('alt' => __('Spirit', true), 'title' => __('See Team Spirit Report', true)));
				echo $this->ZuluruHtml->iconLink('move_24.png',
					array('action' => 'move', 'team' => $team['Team']['id']),
					array('alt' => __('Move Team', true), 'title' => __('Move Team', true)));
				echo $this->ZuluruHtml->iconLink('delete_24.png',
					array('action' => 'delete', 'team' => $team['Team']['id']),
					array('alt' => __('Delete', true), 'title' => __('Delete Team', true)),
					array('confirm' => sprintf(__('Are you sure you want to delete # %s?', true), $team['Team']['id'])));
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?> | 
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
