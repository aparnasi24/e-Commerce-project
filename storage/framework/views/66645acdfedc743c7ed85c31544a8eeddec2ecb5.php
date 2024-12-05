<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('header', null, []); ?> 
    <div class="flex justify-between items-center">
      
        
        <div class="relative">
            <button id="user-menu-button" class="flex items-center text-gray-800 hover:text-gray-600 focus:outline-none" aria-haspopup="true" aria-expanded="true">
                <?php echo e(Auth::user()->name); ?>

                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <div id="user-menu" class="absolute right-0 z-10 mt-2 w-48 bg-white rounded-md shadow-lg hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                <div class="py-1" role="none">
                    <a href="<?php echo e(route('logout')); ?>" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <?php echo e(__('Log Out')); ?>

                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>
        
        <a class="btn btn-green" href="/redirect">
            <?php echo e(__('HOME')); ?>

        </a>
    </div>
 <?php $__env->endSlot(); ?>

    <style>
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-green {
            background-color: #2ecc71;
            color: white;
        }

        .btn-red {
            background-color: #e74c3c;
            color: white;
        }
    </style>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            
            <?php if(Laravel\Fortify\Features::canUpdateProfileInformation()): ?>
                <form method="POST" action="<?php echo e(route('user-profile-information.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input id="name" name="name" type="text" value="<?php echo e(Auth::user()->name); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="<?php echo e(Auth::user()->email); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-green">Update Profile</button>
                    </div>
                </form>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>

            
            <?php if(Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords())): ?>
                <form method="POST" action="<?php echo e(route('user-password.update')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mt-4">
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                        <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-green">Update Password</button>
                    </div>
                </form>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.section-border','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-section-border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>


          
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<script>
    document.getElementById('user-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('user-menu');
        menu.classList.toggle('hidden');
    });

    // Close the menu if clicked outside
    window.addEventListener('click', function(e) {
        if (!document.getElementById('user-menu-button').contains(e.target) && !document.getElementById('user-menu').contains(e.target)) {
            document.getElementById('user-menu').classList.add('hidden');
        }
    });
</script><?php /**PATH /home/tonny/Laravel/prog/assignment3/mynetwork/resources/views/profile/show.blade.php ENDPATH**/ ?>