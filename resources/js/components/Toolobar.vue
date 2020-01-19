<template>
  <v-card
    color="blue "
    flat
    tile
  >
    <v-toolbar color="blue">
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->

      <v-toolbar-title>LaraPusher</v-toolbar-title>

      <v-spacer></v-spacer>

    <div class="hidden-sm-and-down">
         <v-btn text>
                  Forum
        </v-btn>

        <v-btn text>
            Question
        </v-btn>

        <v-btn text>
           Category
        </v-btn>
        <router-link to="/login">
        <v-btn text>
            Login
        </v-btn>
        </router-link>

    </div>
    </v-toolbar>
  </v-card>
</template>

<script>
export default {

}
</script>
