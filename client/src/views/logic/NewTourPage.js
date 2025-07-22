export default {
  name: "CreateTournament",
  data() {
    return {
      showDropdown: false,
      associations: ["Tây Ban Nha", "Anh"],
      leagues: ["La Liga", "Champions League", "EPL"],
      teamOptions: [
        { name: "Man City" },
        { name: "Liverpool" },
        { name: "Chelsea" },
        { name: "Arsenal" },
        { name: "Real Madrid" },
        { name: "Barcelona" },
      ],
      form: {
        association: "",
        league: "",
        participate: "",
        teams: [],
        format: "",
      },
    };
  },
  methods: {
    toggleDropdown() {
      this.showDropdown = !this.showDropdown;
    },
    isTeamSelected(team) {
      return this.form.teams.some(t => t.name === team.name);
    },
    toggleTeam(team) {
      const exists = this.form.teams.find((t) => t.name === team.name);
      if (exists) {
        this.form.teams = this.form.teams.filter(
          (t) => t.name !== team.name
        );
      } else {
        this.form.teams.push(team);
      }
    },
    removeTeam(team) {
      this.form.teams = this.form.teams.filter(
        (t) => t.name !== team.name
      );
    },
    handleSubmit() {
      console.log("Form submitted:", this.form);
      alert("Tournament created successfully!");
    },
  },
  mounted() {
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!this.$el.contains(e.target)) {
        this.showDropdown = false;
      }
    });
  },
};