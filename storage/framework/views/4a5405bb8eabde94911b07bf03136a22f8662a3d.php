<h2><?php echo e($client->getName()); ?></h2>
<form method="post" action="<?php echo e(route('oauth.authorize.post', $params)); ?>">
  <?php echo e(csrf_field()); ?>

  <input type="hidden" name="client_id" value="<?php echo e($params['client_id']); ?>">
  <input type="hidden" name="redirect_uri" value="<?php echo e($params['redirect_uri']); ?>">
  <input type="hidden" name="response_type" value="<?php echo e($params['response_type']); ?>">
  <input type="hidden" name="state" value="<?php echo e($params['state']); ?>">
  <input type="hidden" name="scope" value="<?php echo e($params['scope']); ?>">

  <button type="submit" name="approve" value="1">Approve</button>
  <button type="submit" name="deny" value="1">Deny</button>
</form>