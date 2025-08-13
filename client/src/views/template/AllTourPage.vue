<template>
  <div class="page-container">
    <div class="page-header">
      <h2>All Tournaments</h2>
    </div>

    <div class="tournaments-list">
      <div class="tournament-title">
        <table>
            <thead>
              <tr>
                <th>Association</th>
                <th>League</th>
                <th>Participate</th>
                <th>Teams</th>  
                <th>Format</th>
                <th>Created on</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>FIFA</td>
                <td>World Cup</td>
                <td>Yes</td>
                <td>32</td>
                <td>Tournament</td>
                <td>2024-01-15</td>
                <td>
                    <button><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script src="../logic/AllTourPage.js"></script>
<style scoped src="../style/AllTourPage.css"></style>
