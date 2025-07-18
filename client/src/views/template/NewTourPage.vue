<template>
  <div class="tour-container">
    <div class="header-content">
      <h2>Create New Tournament</h2>
    </div>

    <div class="create-tour-form">
      <form @submit.prevent="handleSubmit">
        <!-- Association -->
        <div class="form-group">
          <label>Association</label>
          <select v-model="form.association">
            <option value="">Select association</option>
            <option v-for="item in associations" :key="item" :value="item">
              {{ item }}
            </option>
          </select>
        </div>

        <!-- League -->
        <div class="form-group">
          <label>League</label>
          <select v-model="form.league">
            <option value="">Select league</option>
            <option v-for="item in leagues" :key="item" :value="item">
              {{ item }}
            </option>
          </select>
        </div>

        <!-- Participate -->
        <div class="form-group">
          <label>Participate</label>
          <select v-model="form.participate">
            <option value=""># of participants</option>
            <option v-for="n in 128" :key="n" :value="n">{{ n }}</option>
          </select>
        </div>

        <!-- Teams -->
        <div class="form-group">
          <label>Teams</label>
          <div class="teams-selector">
            <div class="selected-teams" v-if="form.teams.length > 0">
              <span
                v-for="team in form.teams"
                :key="team.name"
                class="team-tag"
              >
                {{ team.name }}
                <i @click="removeTeam(team)">×</i>
              </span>
            </div>
            <div class="teams-dropdown">
              <div class="dropdown-header" @click="toggleDropdown">
                <span>{{ form.teams.length > 0 ? `${form.teams.length} teams selected` : 'Select teams' }}</span>
                <i class="arrow" :class="{ 'arrow-up': showDropdown }">▼</i>
              </div>
              <div v-if="showDropdown" class="dropdown-content">
                <div 
                  v-for="team in teamOptions" 
                  :key="team.name"
                  class="team-option"
                >
                  <input
                    type="checkbox"
                    :id="'team-' + team.name"
                    :checked="isTeamSelected(team)"
                    @change="toggleTeam(team)"
                    class="team-checkbox"
                  />
                  <label :for="'team-' + team.name" class="team-label">
                    {{ team.name }}
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Format -->
        <div class="form-group">
          <label>Format</label>
          <div class="radio-group">
            <label class="radio-label">
              <input type="radio" value="Knockout" v-model="form.format" />
              Knockout
            </label>
            <label class="radio-label">
              <input type="radio" value="RoundRobin" v-model="form.format" />
              Round Robin
            </label>
            <label class="radio-label">
              <input type="radio" value="Double" v-model="form.format" />
              Double
            </label>
            <label class="radio-label">
              <input type="radio" value="Groups" v-model="form.format" />
              Multistage
            </label>
          </div>
        </div>

        <button type="submit" class="submit-btn">Create Tournament</button>
      </form>
    </div>
  </div>
</template>

<script src="../logic/NewTourPage.js"></script>
<style scoped src="../style/NewTourPage.css"></style>