<template>
    <header>
        <nav>
            <RouterLink to="/">Home</RouterLink>
            |
            <RouterLink to="/products">Products</RouterLink>
        </nav>
    </header>

    <main>
        <RouterView />
    </main>
</template>
