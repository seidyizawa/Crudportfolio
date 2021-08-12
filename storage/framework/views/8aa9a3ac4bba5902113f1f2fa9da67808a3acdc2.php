<?php $__env->startSection('content'); ?>

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Cadastrar Usuario
  </div>

  <div class="card-body">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div><br />
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('usuarios.store')); ?>">
          <div class="form-group">
              <?php echo csrf_field(); ?>
              <label for="name">Nome</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="numeric" class="form-control" name="cpf"/>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"/>
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" class="form-control" name="password"/>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirmar Senha</label>
        <input type="password" class="form-control" name="password_confirmation"/>
    </div>
          <div class="form-group">
              <label for="address">Endereço</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="status">Status</label>
              <input type="text" class="form-control" name="status"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Cadastrar Usuario</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seidy\Documents\GitHub\Crudportfolio\resources\views/create.blade.php ENDPATH**/ ?>