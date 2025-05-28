import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Add
import androidx.compose.material.icons.filled.Delete
import androidx.compose.material.icons.filled.Home
import androidx.compose.material.icons.filled.Person
import androidx.compose.material.icons.filled.Settings
import androidx.compose.material.icons.outlined.CalendarToday
import androidx.compose.material3.Card
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.FloatingActionButton
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp

@Composable
fun PersonalScheduleScreen() {
    val pinkColor = Color(0xFFFF69B4)

    Scaffold(
        containerColor = pinkColor,
        bottomBar = {
            BottomNavigationBar()
        },
        floatingActionButton = {
            FloatingActionButton(
                onClick = { /* Xử lý khi nhấn nút thêm */ },
                containerColor = Color.White,
                contentColor = Color.Black,
                shape = RoundedCornerShape(12.dp),
                modifier = Modifier
                    .size(60.dp)
                    .padding(bottom = 80.dp, end = 20.dp)
            ) {
                Icon(
                    imageVector = Icons.Filled.Add,
                    contentDescription = "Add",
                    modifier = Modifier.size(30.dp)
                )
            }
        }
    ) { paddingValues ->
        Column(
            modifier = Modifier
                .fillMaxSize()
                .padding(paddingValues)
                .padding(horizontal = 20.dp, vertical = 24.dp),
            verticalArrangement = Arrangement.spacedBy(24.dp) // Tăng khoảng cách giữa các phần tử
        ) {
            // Title with calendar icon
            Row(
                modifier = Modifier.fillMaxWidth(),
                verticalAlignment = Alignment.CenterVertically,
                horizontalArrangement = Arrangement.SpaceBetween
            ) {
                Card(
                    modifier = Modifier
                        .weight(1f)
                        .height(60.dp), // Tăng chiều cao
                    shape = RoundedCornerShape(30.dp),
                    colors = CardDefaults.cardColors(
                        containerColor = Color.White
                    )
                ) {
                    Box(
                        modifier = Modifier
                            .fillMaxSize()
                            .padding(horizontal = 20.dp),
                        contentAlignment = Alignment.Center
                    ) {
                        Text(
                            text = "Lịch trình cá nhân",
                            fontSize = 18.sp, // Tăng kích thước font
                            fontWeight = FontWeight.Bold,
                            color = Color.Black
                        )
                    }
                }

                Spacer(modifier = Modifier.padding(12.dp)) // Tăng khoảng cách

                // Calendar icon
                Box(
                    modifier = Modifier
                        .size(60.dp) // Tăng kích thước
                        .clip(CircleShape)
                        .background(Color.White),
                    contentAlignment = Alignment.Center
                ) {
                    Icon(
                        imageVector = Icons.Outlined.CalendarToday,
                        contentDescription = "Calendar",
                        modifier = Modifier.size(30.dp), // Tăng kích thước icon
                        tint = Color.Black
                    )
                }
            }

            // Thêm khoảng cách sau tiêu đề
            Spacer(modifier = Modifier.height(8.dp))

            // List items
            ScheduleItem(name = "Núi Bà Đen")

            // Tăng khoảng cách giữa các mục
            Spacer(modifier = Modifier.height(8.dp))

            ScheduleItem(name = "Biển Nha Trang")

            // Tăng khoảng cách giữa các mục
            Spacer(modifier = Modifier.height(8.dp))

            ScheduleItem(name = "Biển Vũng Tàu")
        }
    }
}

@Composable
fun ScheduleItem(name: String) {
    Row(
        modifier = Modifier.fillMaxWidth(),
        verticalAlignment = Alignment.CenterVertically,
        horizontalArrangement = Arrangement.SpaceBetween
    ) {
        Card(
            modifier = Modifier
                .weight(1f)
                .height(60.dp), // Tăng chiều cao
            shape = RoundedCornerShape(30.dp),
            colors = CardDefaults.cardColors(
                containerColor = Color.White
            )
        ) {
            Box(
                modifier = Modifier
                    .fillMaxSize()
                    .padding(horizontal = 20.dp),
                contentAlignment = Alignment.CenterStart
            ) {
                Text(
                    text = name,
                    fontSize = 18.sp, // Tăng kích thước font
                    color = Color.Black
                )
            }
        }

        Spacer(modifier = Modifier.padding(12.dp)) // Tăng khoảng cách

        // Delete icon
        Box(
            modifier = Modifier
                .size(60.dp) // Tăng kích thước
                .clip(CircleShape)
                .background(Color.White),
            contentAlignment = Alignment.Center
        ) {
            IconButton(
                onClick = { /* Xử lý khi nhấn nút xóa */ },
                modifier = Modifier.size(60.dp) // Tăng kích thước vùng nhấn
            ) {
                Icon(
                    imageVector = Icons.Filled.Delete,
                    contentDescription = "Delete",
                    modifier = Modifier.size(30.dp), // Tăng kích thước icon
                    tint = Color.Black
                )
            }
        }
    }
}

@Composable
fun BottomNavigationBar() {
    Row(
        modifier = Modifier
            .fillMaxWidth()
            .height(70.dp) // Tăng chiều cao
            .background(Color.White),
        horizontalArrangement = Arrangement.SpaceEvenly,
        verticalAlignment = Alignment.CenterVertically
    ) {
        // Home icon
        IconButton(
            onClick = { /* Xử lý khi nhấn Home */ },
            modifier = Modifier.size(60.dp) // Tăng kích thước vùng nhấn
        ) {
            Icon(
                imageVector = Icons.Filled.Home,
                contentDescription = "Home",
                modifier = Modifier.size(32.dp), // Tăng kích thước icon
                tint = Color.Black
            )
        }

        // Hot place text
        Column(
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            Text(
                text = "hot",
                fontSize = 16.sp, // Tăng kích thước font
                color = Color(0xFFFF69B4)
            )
            Text(
                text = "place",
                fontSize = 16.sp, // Tăng kích thước font
                color = Color(0xFFFF69B4)
            )
        }

        // Profile icon
        IconButton(
            onClick = { /* Xử lý khi nhấn Profile */ },
            modifier = Modifier.size(60.dp) // Tăng kích thước vùng nhấn
        ) {
            Icon(
                imageVector = Icons.Filled.Person,
                contentDescription = "Profile",
                modifier = Modifier.size(32.dp), // Tăng kích thước icon
                tint = Color.Black
            )
        }

        // Settings icon
        IconButton(
            onClick = { /* Xử lý khi nhấn Settings */ },
            modifier = Modifier.size(60.dp) // Tăng kích thước vùng nhấn
        ) {
            Icon(
                imageVector = Icons.Filled.Settings,
                contentDescription = "Settings",
                modifier = Modifier.size(32.dp), // Tăng kích thước icon
                tint = Color.Black
            )
        }
    }
}

