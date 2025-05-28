package com.example.datn

import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.border
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
import androidx.compose.material.icons.filled.Home
import androidx.compose.material.icons.filled.Person
import androidx.compose.material.icons.filled.Settings
import androidx.compose.material3.Button
import androidx.compose.material3.ButtonDefaults
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp

@Composable
fun ProfileSettingsScreen() {
    val pinkColor = Color(0xFFFF69B4)

    Scaffold(
        bottomBar = {
            Row(
                modifier = Modifier
                    .fillMaxWidth()
                    .background(Color.White)
                    .padding(8.dp),
                horizontalArrangement = Arrangement.SpaceAround
            ) {
                IconButton(onClick = { /* Xử lý khi nhấn Home */ }) {
                    Icon(
                        imageVector = Icons.Default.Home,
                        contentDescription = "Home",
                        tint = Color.Black
                    )
                }

                IconButton(onClick = { /* Xử lý khi nhấn Hot Place */ }) {
                    Column(horizontalAlignment = Alignment.CenterHorizontally) {
                        Text(
                            text = "hot",
                            fontSize = 12.sp,
                            color = Color.Red
                        )
                        Text(
                            text = "place",
                            fontSize = 12.sp,
                            color = Color.Black
                        )
                    }
                }

                IconButton(onClick = { /* Xử lý khi nhấn Profile */ }) {
                    Icon(
                        imageVector = Icons.Default.Person,
                        contentDescription = "Profile",
                        tint = Color.Black
                    )
                }

                IconButton(onClick = { /* Xử lý khi nhấn Settings */ }) {
                    Icon(
                        imageVector = Icons.Default.Settings,
                        contentDescription = "Settings",
                        tint = Color.Black
                    )
                }
            }
        }
    ) { paddingValues ->
        Column(
            modifier = Modifier
                .fillMaxSize()
                .padding(paddingValues)
                .background(pinkColor)
                .padding(16.dp),
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            // Phần thông tin người dùng
            Row(
                modifier = Modifier
                    .fillMaxWidth()
                    .padding(bottom = 16.dp),
                verticalAlignment = Alignment.CenterVertically
            ) {
                // Avatar
                Box(
                    modifier = Modifier
                        .size(60.dp)
                        .clip(CircleShape)
                        .background(Color.White)
                        .border(2.dp, Color.Gray, CircleShape),
                    contentAlignment = Alignment.Center
                ) {
                    Icon(
                        imageVector = Icons.Default.Person,
                        contentDescription = "Avatar",
                        tint = Color.Gray,
                        modifier = Modifier.size(40.dp)
                    )
                }

                // Thông tin người dùng
                Column(
                    modifier = Modifier.padding(start = 16.dp)
                ) {
                    Text(
                        text = "Gia Bảo",
                        fontSize = 18.sp,
                        fontWeight = FontWeight.Bold,
                        color = Color.Black
                    )
                    Text(
                        text = "id: 0306221305",
                        fontSize = 14.sp,
                        color = Color.Black
                    )
                }
            }

            // Các mục cài đặt
            SettingItem(
                iconResId = R.drawable.ic_handshake,
                text = "",
                onClick = { /* Xử lý khi nhấn vào mục */ }
            )

            SettingItem(
                iconResId = R.drawable.ic_calendar,
                text = "Lịch trình cá nhân",
                onClick = { /* Xử lý khi nhấn vào mục */ }
            )

            SettingItem(
                iconResId = R.drawable.ic_policy,
                text = "Chính sách",
                onClick = { /* Xử lý khi nhấn vào mục */ }
            )

            SettingItem(
                iconResId = R.drawable.ic_security,
                text = "Bảo mật",
                onClick = { /* Xử lý khi nhấn vào mục */ }
            )

            SettingItem(
                iconResId = R.drawable.ic_globe,
                text = "",
                onClick = { /* Xử lý khi nhấn vào mục */ }
            )

            SettingItem(
                iconResId = R.drawable.ic_developer,
                text = "Nhà phát triển",
                onClick = { /* Xử lý khi nhấn vào mục */ }
            )

            SettingItem(
                iconResId = R.drawable.ic_delete,
                text = "xóa tài khoản",
                onClick = { /* Xử lý khi nhấn vào mục */ }
            )

            Spacer(modifier = Modifier.weight(1f))

            // Nút đăng xuất
            Button(
                onClick = { /* Xử lý khi nhấn đăng xuất */ },
                modifier = Modifier
                    .fillMaxWidth(0.5f)
                    .height(50.dp),
                colors = ButtonDefaults.buttonColors(
                    containerColor = Color(0xFF90EE90) // Màu xanh lá nhạt
                ),
                shape = RoundedCornerShape(24.dp)
            ) {
                Text(
                    text = "đăng xuất",
                    fontSize = 16.sp,
                    color = Color.Black
                )
            }
        }
    }
}

@Composable
fun SettingItem(
    iconResId: Int,
    text: String,
    onClick: () -> Unit
) {
    Row(
        modifier = Modifier
            .fillMaxWidth()
            .padding(vertical = 8.dp)
            .background(Color.White, RoundedCornerShape(8.dp))
            .padding(vertical = 12.dp, horizontal = 16.dp)
            .height(40.dp),
        verticalAlignment = Alignment.CenterVertically
    ) {
        // Icon
        Image(
            painter = painterResource(id = iconResId),
            contentDescription = null,
            modifier = Modifier.size(24.dp)
        )

        // Text
        Text(
            text = text,
            fontSize = 16.sp,
            color = Color.Black,
            modifier = Modifier
                .padding(start = 16.dp)
                .weight(1f)
        )
    }
}

