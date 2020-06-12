<template>
<nav>
  <v-toolbar  flat app  >
    <v-toolbar-side-icon @click.stop="drawer = !drawer" class="grey--text"></v-toolbar-side-icon>
    <v-spacer></v-spacer>


    <v-menu
      offset-y
      origin="center center"
      class="elelvation-1"
      :nudge-bottom="14"
      transition="scale-transition"
    >
      <v-btn @click="markAsRead" icon flat slot="activator">
        <v-badge color="red" overlap>
          <span slot="badge">{{unreadNotifications.length}}</span>
          <v-icon medium>notifications</v-icon>
        </v-badge>
      </v-btn>

      <v-list>
        <v-list-tile :class="{'green': notification.read_at==null}" @click="markAsRead" v-for="notification in allNotifications" :key="notification.id">
          <v-list-tile-content>
            <v-list-tile-title>{{notification.data.createdUser.name}} has just registered on {{notification.created_at}}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-menu>
    <v-menu offset-y origin="center center" :nudge-bottom="10" transition="scale-transition">
      <v-btn icon large flat slot="activator">
        <v-avatar size="30px">
          <img src="/image/man.png" alt="any name">
        </v-avatar>
      </v-btn>
      <v-list class="pa-0">
        <v-list-tile ripple="ripple" rel="noopener">
          <v-list-tile-content>
            <v-list-tile-title>{{user.name}}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>

      <v-list class="pa-0">
        <v-list-tile @click="logout" ripple="ripple" rel="noopener">
          <v-list-tile-action color="red">
            <v-icon >account_circle</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Logout</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-menu>
  </v-toolbar>


    <v-navigation-drawer   class=" hidden-xs-down"  dark v-model="drawer" app >
   <v-layout column align-center>
     <v-flex class="mt-5">
       <v-avatar size="80">
         <img  src="https://randomuser.me/api/portraits/men/1.jpg">

       </v-avatar>
       <p class="white--text subheading mt-1">
                  {{ user.name }}

       </p>
     </v-flex>
   </v-layout>
           <v-divider></v-divider>

   <v-list dense>
    <v-list-tile class="mt-3" exact to="/admin">
      <v-list-tile-action>
        <v-icon   large color="rgb(147,95,182)">dashboard</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Dashboard</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>

    <v-list-group no-action   v-if="$auth.isAdmin()">
      <v-list-tile class="mt-3" slot="activator">
        <v-list-tile-action>
          <v-icon large color="yellow">account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title >User Management</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
       <v-list-tile class="mt-3" to="/admin/faculty">
        <v-list-tile-action>
          <v-icon large color="pink lighten-5">account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Faculty</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

       <v-list-tile class="mt-3" to="/admin/department">
        <v-list-tile-action>
          <v-icon large color="red lighten-2">account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Department</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

      <v-list-tile class="mt-3"  to="/admin/users">
        <v-list-tile-action>
          <v-icon large color="blue lighten-5">account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Users</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

      <v-list-tile class="mt-3" to="/admin/roles">
        <v-list-tile-action>
          <v-icon large color="light-blue accent-1">account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Roles</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

      <v-list-tile class="mt-3"  to="/admin/permissions">
        <v-list-tile-action>
          <v-icon large>account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Permissions</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list-group>

        <v-list-group no-action   v-if="$auth.isAdmin()||$auth.isManager()">
      <v-list-tile class="mt-3" slot="activator">
        <v-list-tile-action>
          <v-icon large color="cyan accent-3">account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Store</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

      <v-list-tile class="mt-3" to="/admin/category">
      <v-list-tile-action>
        <v-icon large color="teal lighten-1">settings</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title >Category</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>

      <v-list-tile class="mt-3"  to="/admin/item">
      <v-list-tile-action>
        <v-icon large color="green accent-3">settings</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Items</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>

        </v-list-group>

    <v-list-tile class="mt-3" to="/admin/activities">
      <v-list-tile-action>

        <v-icon large  color="lime lighten-5">settings</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Activities</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>
  
  </v-list>
      </v-navigation-drawer>
      </nav>
</template>


<script>
export default {
  props: ["user"],
  data: () => ({
    drawer: true,
    allNotifications: [],
    unreadNotifications: [],
  }),
  props: ["user"],
  watch:{
      allNotifications(val){
          this.unreadNotifications =  this.allNotifications.filter(notification => {
            return notification.read_at == null;
        });
      }
  },

  methods: {
    logout() {
      axios.post("/logout").then(response => window.location.reload());
    },
    markAsRead() {
      axios.get("/mark-all-read/" + this.user.id).then(response=>{
          this.unreadNotifications = [];
      });
    }
  },

  created() {
    this.allNotifications = this.user.notifications;

    this.unreadNotifications =  this.allNotifications.filter(notification => {
        return notification.read_at == null;
      });

    // Echo.private("App.User." + this.user.id).notification(notification => {
    //   this.allNotifications.unshift(notification.notification);
    // });
  }
};
</script>
