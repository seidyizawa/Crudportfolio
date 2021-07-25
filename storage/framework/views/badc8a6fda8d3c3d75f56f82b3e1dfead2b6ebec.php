<?php $__env->startSection('content'); ?>

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  <?php if(session()->get('completed')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo e(session()->get('completed')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div><br />

  <?php endif; ?>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>CPF</td>
          <td>Email</td>
          <td>Password</td>
          <td>Address</td>
          <td>Status</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($usuarios->id); ?></td>
            <td><?php echo e($usuarios->name); ?></td>
            <td><?php echo e($usuarios->cpf); ?></td>
            <td><?php echo e($usuarios->email); ?></td>
            <td><?php echo e($usuarios->password); ?></td>
            <td><?php echo e($usuarios->address); ?></td>
            <td><?php echo e($usuarios->status); ?></td>
            <td class="text-center">
                <a href="<?php echo e(route('usuarios.edit', $usuarios->id)); ?>" class="btn btn-primary btn-sm"">Editar</a>
                <form action="<?php echo e(route('usuarios.destroy', $usuarios->id)); ?>" method="post" style="display: inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm"" type="submit">Deletar</button>
                  </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<div>
    <a href="/usuarios/create" class="btn btn-info btn-block" role="button">Cadastrar</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\edward\edward-app\resources\views/index.blade.php ENDPATH**/ ?>