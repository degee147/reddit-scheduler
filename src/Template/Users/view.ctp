<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chv Users'), ['controller' => 'ChvUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chv User'), ['controller' => 'ChvUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($user->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Country') ?></th>
            <td><?= $this->Number->format($user->active_country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin') ?></th>
            <td><?= $user->admin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sa') ?></th>
            <td><?= $user->sa ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Chv Users') ?></h4>
        <?php if (!empty($user->chv_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('User Username') ?></th>
                <th scope="col"><?= __('User Date') ?></th>
                <th scope="col"><?= __('User Date Gmt') ?></th>
                <th scope="col"><?= __('User Email') ?></th>
                <th scope="col"><?= __('User Avatar Filename') ?></th>
                <th scope="col"><?= __('User Facebook Username') ?></th>
                <th scope="col"><?= __('User Twitter Username') ?></th>
                <th scope="col"><?= __('User Website') ?></th>
                <th scope="col"><?= __('User Background Filename') ?></th>
                <th scope="col"><?= __('User Bio') ?></th>
                <th scope="col"><?= __('User Timezone') ?></th>
                <th scope="col"><?= __('User Language') ?></th>
                <th scope="col"><?= __('User Status') ?></th>
                <th scope="col"><?= __('User Is Admin') ?></th>
                <th scope="col"><?= __('User Is Manager') ?></th>
                <th scope="col"><?= __('User Is Private') ?></th>
                <th scope="col"><?= __('User Newsletter Subscribe') ?></th>
                <th scope="col"><?= __('User Show Nsfw Listings') ?></th>
                <th scope="col"><?= __('User Image Count') ?></th>
                <th scope="col"><?= __('User Album Count') ?></th>
                <th scope="col"><?= __('User Image Keep Exif') ?></th>
                <th scope="col"><?= __('User Image Expiration') ?></th>
                <th scope="col"><?= __('User Registration Ip') ?></th>
                <th scope="col"><?= __('User Likes') ?></th>
                <th scope="col"><?= __('User Liked') ?></th>
                <th scope="col"><?= __('User Following') ?></th>
                <th scope="col"><?= __('User Followers') ?></th>
                <th scope="col"><?= __('User Content Views') ?></th>
                <th scope="col"><?= __('User Notifications Unread') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->chv_users as $chvUsers): ?>
            <tr>
                <td><?= h($chvUsers->user_id) ?></td>
                <td><?= h($chvUsers->user_name) ?></td>
                <td><?= h($chvUsers->user_username) ?></td>
                <td><?= h($chvUsers->user_date) ?></td>
                <td><?= h($chvUsers->user_date_gmt) ?></td>
                <td><?= h($chvUsers->user_email) ?></td>
                <td><?= h($chvUsers->user_avatar_filename) ?></td>
                <td><?= h($chvUsers->user_facebook_username) ?></td>
                <td><?= h($chvUsers->user_twitter_username) ?></td>
                <td><?= h($chvUsers->user_website) ?></td>
                <td><?= h($chvUsers->user_background_filename) ?></td>
                <td><?= h($chvUsers->user_bio) ?></td>
                <td><?= h($chvUsers->user_timezone) ?></td>
                <td><?= h($chvUsers->user_language) ?></td>
                <td><?= h($chvUsers->user_status) ?></td>
                <td><?= h($chvUsers->user_is_admin) ?></td>
                <td><?= h($chvUsers->user_is_manager) ?></td>
                <td><?= h($chvUsers->user_is_private) ?></td>
                <td><?= h($chvUsers->user_newsletter_subscribe) ?></td>
                <td><?= h($chvUsers->user_show_nsfw_listings) ?></td>
                <td><?= h($chvUsers->user_image_count) ?></td>
                <td><?= h($chvUsers->user_album_count) ?></td>
                <td><?= h($chvUsers->user_image_keep_exif) ?></td>
                <td><?= h($chvUsers->user_image_expiration) ?></td>
                <td><?= h($chvUsers->user_registration_ip) ?></td>
                <td><?= h($chvUsers->user_likes) ?></td>
                <td><?= h($chvUsers->user_liked) ?></td>
                <td><?= h($chvUsers->user_following) ?></td>
                <td><?= h($chvUsers->user_followers) ?></td>
                <td><?= h($chvUsers->user_content_views) ?></td>
                <td><?= h($chvUsers->user_notifications_unread) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ChvUsers', 'action' => 'view', $chvUsers->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ChvUsers', 'action' => 'edit', $chvUsers->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ChvUsers', 'action' => 'delete', $chvUsers->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chvUsers->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
