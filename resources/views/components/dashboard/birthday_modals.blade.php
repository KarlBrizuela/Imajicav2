<!-- All Birthdays Modal -->
<div class="modal fade" id="allBirthdaysModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="ti tabler-gift me-2 text-primary"></i>
          All Client Birthdays
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Filter Section -->
        <div class="row mb-3">
          <div class="col-md-6">
            <select class="form-select" id="birthdayFilter">
              <option value="all">All Months</option>
              <option value="current">Current Month</option>
              <option value="upcoming">Upcoming Birthdays</option>
              <option value="past">Past Birthdays</option>
            </select>
          </div>
        </div>

        <!-- Birthday Calendar View -->
        <div class="birthday-calendar">
          <div class="month-grid">
            @foreach($allBirthdays as $month => $patients)
              <div class="month-card {{ $month == Carbon\Carbon::now()->format('F') ? 'current-month' : '' }}">
                <h6 class="month-title py-2 px-3">{{ $month }}</h6>
                <div class="birthday-list">
                  @foreach($patients as $patient)
                    <div class="birthday-item d-flex align-items-center p-3 border-bottom">
                      <div class="avatar me-3">
                        <span class="avatar-initial rounded-circle bg-label-{{ $patient->daysUntil == 0 ? 'danger' : ($patient->daysUntil <= 7 ? 'primary' : 'success') }}">
                          {{ $patient->initials }}
                        </span>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-0">{{ $patient->firstname }} {{ $patient->lastname }}</h6>
                        <div class="d-flex align-items-center">
                          <small class="text-muted">{{ Carbon\Carbon::parse($patient->birthdate)->format('F d') }} ({{ $patient->age }} years)</small>
                          @if($patient->daysUntil == 0)
                            <span class="badge bg-label-danger ms-2">Today</span>
                          @elseif($patient->daysUntil > 0 && $patient->daysUntil <= 30)
                            <span class="badge bg-label-{{ $patient->daysUntil <= 7 ? 'primary' : 'success' }} ms-2">In {{ $patient->daysUntil }} days</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Send Wishes Modal -->
<div class="modal fade" id="sendWishesModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="ti tabler-mail me-2 text-primary"></i>
          Send Birthday Wishes
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Select Template</label>
          <select class="form-select">
            <option value="1">Birthday Greeting - Standard</option>
            <option value="2">Birthday Greeting - VIP Client</option>
            <option value="3">Birthday Greeting - Premium</option>
            <option value="4">Custom Message</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Message</label>
          <textarea class="form-control" rows="4">Dear [Client Name],

Happy Birthday! 🎉 We hope your special day is filled with joy and wonderful moments. As a valued client of Imajica, we want to make your birthday extra special.

Best wishes,
The Imajica Team</textarea>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="sendCopy" />
          <label class="form-check-label" for="sendCopy">
            Send me a copy of this message
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Cancel
        </button>
        <button type="button" class="btn btn-primary">
          <i class="ti tabler-send me-1"></i>
          Send Wishes
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Apply filter when modal is shown
    const birthdayModal = document.getElementById('allBirthdaysModal');
    if (birthdayModal) {
      birthdayModal.addEventListener('shown.bs.modal', function() {
        const filterSelect = document.getElementById("birthdayFilter");
        
        // Apply default filter (all)
        applyBirthdayFilter();
        
        // When filter changes, apply the new filter
        if (filterSelect) {
          filterSelect.value = 'all'; // Reset to "All" when modal opens
          filterSelect.addEventListener("change", function(e) {
            applyBirthdayFilter(e.target.value);
          });
        }
      });
    }
    
    // Function to apply birthday filters
    function applyBirthdayFilter(filterValue = 'all') {
      const monthCards = document.querySelectorAll(".month-card");
      
      // Get current date information
      const today = new Date();
      const currentMonth = today.getMonth(); // 0-11
      const currentDay = today.getDate();
      const currentMonthName = today.toLocaleString('default', { month: 'long' });
      const currentYear = today.getFullYear();

      // Process each month card
      monthCards.forEach((card) => {
        const monthName = card.querySelector(".month-title").textContent.trim();
        // Get month index (0-11) from month name
        const monthIndex = new Date(Date.parse(monthName + " 1, " + currentYear)).getMonth();
        const birthdayItems = card.querySelectorAll(".birthday-item");

        switch (filterValue) {
          case "all":
            // Show all months and birthdays
            card.style.display = "block";
            birthdayItems.forEach(item => item.style.display = "flex");
            break;

          case "current":
            // Show only current month
            if (monthName === currentMonthName) {
              card.style.display = "block";
              birthdayItems.forEach(item => item.style.display = "flex");
            } else {
              card.style.display = "none";
            }
            break;

          case "upcoming":
            if (monthIndex > currentMonth) {
              // Future months - show all birthdays
              card.style.display = "block";
              birthdayItems.forEach(item => item.style.display = "flex");
            } else if (monthIndex === currentMonth) {
              // Current month - show only upcoming birthdays
              card.style.display = "block";
              birthdayItems.forEach(item => {
                // Check if this item has a badge with "days" text - these are upcoming
                const badgeElement = item.querySelector(".badge");
                if (badgeElement && (badgeElement.textContent.includes("In ") || badgeElement.textContent.includes("Today"))) {
                  item.style.display = "flex";
                } else {
                  // Otherwise look for the date and compare
                  const dateText = item.querySelector("small.text-muted").textContent;
                  // Extract the day from format like "February 15" or "February 15 (30 years)"
                  const dayMatch = dateText.match(/(\w+)\s+(\d+)/);
                  if (dayMatch && dayMatch[2]) {
                    const day = parseInt(dayMatch[2]);
                    item.style.display = day >= currentDay ? "flex" : "none";
                  } else {
                    item.style.display = "none";
                  }
                }
              });
            } else {
              // Past months - hide
              card.style.display = "none";
            }
            break;

          case "past":
            if (monthIndex < currentMonth) {
              // Past months - show all birthdays
              card.style.display = "block";
              birthdayItems.forEach(item => item.style.display = "flex");
            } else if (monthIndex === currentMonth) {
              // Current month - show only past birthdays
              card.style.display = "block";
              birthdayItems.forEach(item => {
                const badgeElement = item.querySelector(".badge");
                if (badgeElement && (badgeElement.textContent.includes("In ") || badgeElement.textContent.includes("Today"))) {
                  // If has "In X days" badge or "Today" badge, it's not past - hide it
                  item.style.display = "none";
                } else {
                  // Extract the day and determine if it's past
                  const dateText = item.querySelector("small.text-muted").textContent;
                  const dayMatch = dateText.match(/(\w+)\s+(\d+)/);
                  if (dayMatch && dayMatch[2]) {
                    const day = parseInt(dayMatch[2]);
                    item.style.display = day < currentDay ? "flex" : "none";
                  } else {
                    item.style.display = "none";
                  }
                }
              });
            } else {
              // Future months - hide
              card.style.display = "none";
            }
            break;
        }

        // Hide empty month cards
        if (card.style.display === "block") {
          const visibleItems = Array.from(birthdayItems).filter(item => 
            item.style.display === "flex"
          ).length;
          if (visibleItems === 0) {
            card.style.display = "none";
          }
        }
      });
    }
  });
</script>

<style>
  .birthday-calendar {
    max-height: 60vh;
    overflow-y: auto;
  }
  
  .month-grid {
    display: grid;
    gap: 1rem;
  }
  
  .month-card {
    background: #fff;
    border-radius: 0.5rem;
    border: 1px solid rgba(67, 89, 113, 0.1);
    overflow: hidden;
    margin-bottom: 1rem;
  }
  
  .month-card.current-month {
    border: 1px solid rgba(105, 108, 255, 0.3);
    box-shadow: 0 0 0.5rem rgba(105, 108, 255, 0.1);
  }
  
  .month-title {
    background: rgba(105, 108, 255, 0.05);
    font-weight: 500;
  }
  
  .birthday-item {
    transition: all 0.2s ease;
  }
  
  .birthday-item:hover {
    background: rgba(105, 108, 255, 0.04);
  }
  
  /* Custom scrollbar for the birthday calendar */
  .birthday-calendar::-webkit-scrollbar {
    width: 6px;
  }
  
  .birthday-calendar::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
  }
  
  .birthday-calendar::-webkit-scrollbar-thumb {
    background: #696cff;
    border-radius: 3px;
  }
  
  .birthday-calendar::-webkit-scrollbar-thumb:hover {
    background: #555;
  }
</style> 