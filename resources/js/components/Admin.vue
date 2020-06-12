<template>
  <div id="app">
    <v-app id="inspire" dark>
      <v-content>
        <v-container fluid fill-height>
          <v-layout justify-center>
            <v-flex shrink>            
                <vue-progress-bar></vue-progress-bar>

              <router-view></router-view>
            </v-flex>
          </v-layout>
        </v-container>
      </v-content>
    </v-app>
  </div>
</template>

<script>

export default {
  data: () => ({
  }),
  props: ["user"]
};
</script>
